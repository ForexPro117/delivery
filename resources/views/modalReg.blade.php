
{{--Модалка регистрации--}}
<div class="modal fade" id="ModalReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 39%" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center">
                    <form method="POST" style="width: 70%" action="{{ route('registerPOST') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control " name="email"
                                   placeholder="Электронная почта">
                            @error('email')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name"
                                   placeholder="Имя">
                            @error('name')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="lastname"
                                   placeholder="Фамилия">
                            @error('lastname')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" name="phone"
                                   placeholder="Телефон">
                            @error('phone')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control" name="password"
                                   placeholder="Пароль">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Повторите пароль">
                            @error('password')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center ">
                            <button type="submit" class="btn btn-primary buton">Регистрация</button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <label>Уже есть профиль? <label class="link" data-bs-toggle="modal"
                                                data-bs-target="#ModalLogin">Войти</label></label>
            </div>
        </div>
    </div>
</div>
