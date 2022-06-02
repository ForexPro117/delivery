{{--Модалка авторизации--}}
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 44%" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalLoginBody">
                <div class="d-flex flex-column align-items-center">
                    <form method="POST" style="width: 70%" action="{{ route('loginPOST') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control" id="ModalLogin_email" name="emailLogin"
                                   placeholder="Электронная почта">
                            @error('emailLogin')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control"  id="ModalLogin_password" name="passwordLogin"
                                   placeholder="Пароль">
                            @error('passwordLogin')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="ModalLogin_remember" name="remember">
                            <label class="form-check-label">
                                Запомнить
                            </label>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center ">
                            <button type="submit" class="btn btn-primary buton">Войти</button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
                <label class="link" data-bs-toggle="modal" data-bs-target="#ModalReg">Зарегистрироваться</label>
            </div>
        </div>
    </div>
</div>
