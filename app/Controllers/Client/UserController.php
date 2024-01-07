<?php

namespace App\Controllers\Client;

use App\Models\UserModel;
use Illuminate\Support\Facades\Redirect;

class UserController extends BaseController
{

    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function logup()
    {
        return parent::view("user.logup");
    }

    public function saveLogup()
    {

        $use = $this->user::where("u_username", $_POST['ten'])->orWhere("u_email", $_POST['email'])->first();
        if (isset($use) && ($use->exists)) {
            \log::warn("Ten đăng nhập hoặc email đã tồn tại");
        } else {
            $host = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
            $host .= "://" . $_SERVER['HTTP_HOST'] . "/xac-thuc-tai-khoan";
            $token = rand(0000, 9999) . time();
            $data = [
                'u_username' => $_POST['ten'],
                'u_email' => $_POST['email'],
                'u_password' => $_POST['pass'],
                'token' => $token,
            ];
            $this->user->fill($data);
            $this->user->save();
            $message = 'Vui lòng click vào đây để xác thực tài khoản: <a href="' . $host . '?token=' . $token . '&email=' . $_POST['email'] . '">Xác thực tài khoản tại đây</a>';
            \Mail::send($_POST['email'], 'Thong bao!', $message);

            \log::success('Mail xác nhận tài khoản đã được gửi về email quý khách!');
        }
    }

    public function xacThuc()
    {
        $token = $_GET['token'] ?? null;
        $email = $_GET['email'] ?? null;
        if ($token && $email) {
            $use = $this->user::where("token", $token)->where("u_email", $email)->first();
            if (isset($use) && ($use->exists)) {
                $data = [
                    'u_status' => 0,
                    'token' => NULL
                ];
                $use->update($data);
                $title = "Tài khoản đã được xác thực";
            } else {
                $title = "Tài khoản không tồn tại";
            }
            return parent::view("user.xacthuc", [
                'title' => $title
            ]);
        } else {
            header('Location: /login');
            die();
        }
    }

    public function login()
    {

        $thongBao = isset($_COOKIE['thongbao']) ? $_COOKIE['thongbao'] : null;
        $returnedView = parent::view("user.login");
        if ($thongBao) {
            \log::success($thongBao);
        }
        return $returnedView;
    }

    public function saveLogin()
    {
        $this->login();
        $use = $this->user::where("u_username", $_POST['user'])->orWhere('u_email', $_POST['user'])->where("u_password", $_POST['pass'])->first();
        if (isset($use) && ($use->exists)) {
            switch ($use['u_status']) {
                case 0: {
                        $data = [
                            'id' => $use['id'],
                            'username' => $use['u_username'],
                            'fullname' => $use['u_fullname'],
                            'email' => $use['u_email'],
                            'img' => $use['u_img'],
                            'password' => $use['u_password'],
                            'address' => $use['u_address'],
                            'tel' => $use['u_tel'],
                            'status' => $use['u_status'],
                            'role' => $use['u_role'],
                            'created_at' => $use['created_at']->format('Y-m-d H:i:s'),
                            'updated_at' => $use['updated_at'],
                        ];
                        $_SESSION['user'] = $data;
                        if(!isset($_SESSION['cart'][$use['id']])){
                            $_SESSION['cart'][$use['id']] = [];
                        }
                        // header('Location: /');

                        echo '<script>window.location.replace("/");</script>';
                        exit();
                        break;
                    }
                case 1: {
                        \log::info('Tài khoản chưa được xác thực! Vui lòng xác thực tài khoản');
                        break;
                    }
                case 2: {
                        \log::error('Tài khoản nãy đã bị khóa! Vui lòng liên hệ hỗ trợ');
                        break;
                    }
            }
        } else {
            \log::warn('Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function backLogin()
    {
        unset($_SESSION['user']);
        setcookie('backLogin', true, time() + 3);
        header("location: /");
    }

    public function searchUser()
    {
        return parent::view("user.searchUser");
    }

    public function sendMailPass()
    {
        $email = $_POST['email'];
        if (empty($email)) {
            \log::warn("Vui lòng không được để trống");
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $use = $this->user::where("u_email", $email)->first();
                if (isset($use) && ($use->exists)) {
                    switch ($use['u_status']) {
                        case 0: {
                                $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                                $data = [
                                    'iduser' => $use['id'],
                                    'code' => $code
                                ];
                                setcookie("codeRePass", json_encode($data), time() + 60);
                                \Mail::send($email, "Quen mat khau!", "Vui lòng không cung cấp mã này cho bất kì ai! Mã xác thực của bạn là: <b>" . $code . "</b> <br> Mã này hiệu lực trong <b>60 Phút</b>");
                                \log::success("Mã xác thực đã được gửi!");
                                return parent::view("user.codeRePass");
                                break;
                            }
                        case 1: {
                                \log::info("Tài khoản này chưa được xác thực!");
                                break;
                            }
                        case 2: {
                                \log::error("Tài khoản này đã bị khóa!");
                                break;
                            }
                    }
                } else {
                    \log::info("Email này không tồn tại trong hệ thống!");
                }
            } else {
                \log::error("Email không hợp lệ");
            }
        }
    }

    public function checkCode()
    {
        $code = $_POST['1'] . $_POST['2'] . $_POST['3'] . $_POST['4'] . $_POST['5'] . $_POST['6'];
        $data = json_decode($_COOKIE['codeRePass']);
        if ($code == $data->code) {
            return parent::view("user.newPass", [
                'id' => $data->iduser
            ]);
        } else {
            $returnedView = parent::view("user.codeRePass");
            \log::error("Mã xác minh không chính xác");
            return $returnedView;
        }
    }
    public function changepass()
    {
        $use = $this->user::find($_POST['iduser']);
        $data = [
            'u_password' => $_POST['u_newPass']
        ];
        $use->update($data);
        setcookie('thongbao', "Cập nhật mật khẩu thành công", time() + 3);
        header("Location: /login");
        die();
    }

    public function info()
    {
        $user = [
            'id' => $_SESSION['user']['id'],
            'username' => $_SESSION['user']['username'],
            'fullname' => $_SESSION['user']['fullname'],
            'email' => $_SESSION['user']['email'],
            'img' => $_SESSION['user']['img'],
            'password' => $_SESSION['user']['password'],
            'address' => $_SESSION['user']['address'],
            'tel' => $_SESSION['user']['tel'],
            'created_at' => $_SESSION['user']['created_at'],
        ];

        $returnView = parent::view("user.info", [
            "user" => $user
        ]);
        if (isset($_COOKIE['thongbao'])) {
            \log::success("Cập nhật thông tin thành công");
        }
        return $returnView;
    }

    public function editInfo()
    {
        $address = strstr($_SESSION['user']['address'], ",", true);
        $vesauAddress = explode(",", strstr($_SESSION['user']['address'], ","));
        $user = [
            'id' => $_SESSION['user']['id'],
            'username' => $_SESSION['user']['username'],
            'fullname' => $_SESSION['user']['fullname'],
            'email' => $_SESSION['user']['email'],
            'img' => $_SESSION['user']['img'],
            'password' => $_SESSION['user']['password'],
            'address' => $address,
            'tel' => $_SESSION['user']['tel'],
            'created_at' => $_SESSION['user']['created_at'],
        ];


        return parent::view("user.editInfo", [
            'user' => $user,
            "address" => $vesauAddress
        ]);
    }

    public function saveEditInfo()
    {

        $img = $_FILES['u_img'];
        $nameImg = rand() . $img['name'];
        if (!move_uploaded_file($img['tmp_name'], "./public/uploads/" . $nameImg)) {
            $nameImg = $_SESSION['user']['img'];
        } else {
            $file = "./public/uploads/" . $_SESSION['user']['img'];
            if (is_file($file)) {
                unlink($file);
            }
        }


        $address = $_POST['u_address'] . ", " . $_POST['xa'] . ", " . $_POST['huyen'] . ", " . $_POST['tinh'];
        $data = [
            'u_fullname' => $_POST['u_fullname'],
            'u_tel' => $_POST['u_tel'],
            'u_address' => $address,
            'u_img' => $nameImg
        ];
        $user = $this->user::find($_POST['iduser']);
        $user->update($data);
        $_SESSION['user']['fullname'] = $_POST['u_fullname'];
        $_SESSION['user']['tel'] = $_POST['u_tel'];
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['img'] = $nameImg;
        setcookie("thongbao", true, time() + 3);
        header("location: /info");
    }

    public function CodeUse()
    {
        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $data = [
            'iduser' => $_SESSION['user']['id'],
            'code' => $code
        ];
        setcookie("codeRePass", json_encode($data), time() + 60);
        \Mail::send($_SESSION['user']['email'], "Doi mat khau!", "Vui lòng không cung cấp mã này cho bất kì ai! Mã xác thực của bạn là: <b>" . $code . "</b> <br> Mã này hiệu lực trong <b>60 Phút</b>");
        \log::success("Mã xác thực đã được gửi!");
        return parent::view("user.codeRePass");
    }
}
