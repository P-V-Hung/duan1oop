@extends('layout.index')
@section('title')
<title>Xác minh</title>
@endsection
@section('content')
<div class="codeRePass">

    <div class="signUp">
        <h2>Nhập mã xác minh</h2>

        <form method="post" action="/checkCode">
            <div class="codePass">
                <div class="numberCode">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="1">
                </div>
                <div class="numberCode noneClick">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="2">
                </div>
                <div class="numberCode noneClick">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="3">
                </div>
                <div class="numberCode noneClick">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="4">
                </div>
                <div class="numberCode noneClick">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="5">
                </div>
                <div class="numberCode noneClick">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="6">
                </div>
            </div>
            <button type="submit" class="btnForm" name="btn_checkCode">Xác minh</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.bodySearchUser').html($(".codeRePass").html());
        });
        $(document).ready(function() {
            $('.numberCode input')[0].focus();

            $('.numberCode input').on('input', function() {
                $(".numberCode input").each(function() {
                    $(this).closest(".numberCode").addClass("noneClick");
                });

                var currentValue = $(this).val();
                if (currentValue) {
                    var nextInput = $(this).parent().next().find('input') ?? false;
                    $(nextInput).closest(".numberCode").removeClass("noneClick");
                    if (nextInput.length == 0) {
                        $(this).closest(".numberCode").removeClass("noneClick");
                    }
                    if (currentValue.length == 1) {
                        nextInput.focus();
                    } else {
                        $(this).val(currentValue[0]);
                    }
                } else {
                    $(this).closest(".numberCode").removeClass("noneClick");
                    $(this).val('');
                }

            });
            $(".numberCode input").on("keydown", function(event) {
                $(".numberCode input").each(function() {
                    $(this).closest(".numberCode").addClass("noneClick");
                });
                if (event.keyCode === 8 && $(this).val() === "") {
                    var prevInput = $(this).parent().prev().find('input') ?? false;
                    $(prevInput).closest(".numberCode").removeClass("noneClick");
                    $(this).val('');
                    prevInput.val('');
                    prevInput.focus();
                    if (prevInput.length == 0) {
                        $(this).closest(".numberCode").removeClass("noneClick");
                    }
                }
            });
        });
    </script>
</div>
@endsection
