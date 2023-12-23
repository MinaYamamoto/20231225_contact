<div>
    <button wire:click="openModal()" type="button" class="detail__button">
        詳細
    </button>

    @if($showModal)
    <div class="modal">
        <form class="modal__form">
            <div class="modal__close">
                <button wire:click="closeModal()" type="button" class="modal__close--submit">
            ×
                </button>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>お名前</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="name" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>性別</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="gender" value="gender" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>メールアドレス</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="email" value="email" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>電話番号</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="tell" value="tell" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>住所</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" value="address" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>建物名</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" value="building" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>お問い合わせの種類</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="category" value="category" readonly/>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p>お問い合わせ内容</p>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="detail" value="detail" readonly/>
                    </div>
                </div>
            </div>
            <div class="delete__button">
                <button type="submit" class="delete__button-submit">削除</button>
            </div>
        </form>
    </div>
    @endif
</div>
