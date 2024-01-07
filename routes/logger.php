<?php 
    class log{
        static function success($message,$type = "Success"){
            echo "
                <div class='message message-success'>
                    <div class='message-icon'>
                        <i class='fa-solid fa-circle-check'></i>
                    </div>
                    <div class='message-title'>
                        <h3>$type</h3>
                        <p>$message </p>
                    </div>
                    <div class='message-close'>
                        <i class='fa-solid fa-x'></i>
                    </div>
                </div>
           ";
        }
        static function warn($message,$type = "Warning"){
            echo "
                <div class='message message-warning'>
                    <div class='message-icon'>
                        <i class='fa-solid fa-circle-check'></i>
                    </div>
                    <div class='message-title'>
                        <h3>$type</h3>
                        <p>$message </p>
                    </div>
                    <div class='message-close'>
                        <i class='fa-solid fa-x'></i>
                    </div>
                </div>
           ";
        }
        static function error($message,$type = "Error"){
            echo "
                <div class='message message-error'>
                    <div class='message-icon'>
                        <i class='fa-solid fa-circle-check'></i>
                    </div>
                    <div class='message-title'>
                        <h3>$type</h3>
                        <p>$message </p>
                    </div>
                    <div class='message-close'>
                        <i class='fa-solid fa-x'></i>
                    </div>
                </div>
           ";
        }
        static function info($message,$type = "Info"){
            echo "
                <div class='message message-info'>
                    <div class='message-icon'>
                        <i class='fa-solid fa-circle-check'></i>
                    </div>
                    <div class='message-title'>
                        <h3>$type</h3>
                        <p>$message </p>
                    </div>
                    <div class='message-close'>
                        <i class='fa-solid fa-x'></i>
                    </div>
                </div>
           ";
        }

        static function warnn($message,$type = "Warning"){
            return "
                <div class='message message-warning'>
                    <div class='message-icon'>
                        <i class='fa-solid fa-circle-check'></i>
                    </div>
                    <div class='message-title'>
                        <h3>$type</h3>
                        <p>$message </p>
                    </div>
                    <div class='message-close'>
                        <i class='fa-solid fa-x'></i>
                    </div>
                </div>
           ";
        }
    }
?>