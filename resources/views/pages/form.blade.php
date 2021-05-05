<form action="/send-mail" method="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Ваше имя *</label>
                <input type="text" id="name" name="name" class="form-input form-input--large form-input--border-c-alto" placeholder="Ваше имя"
                required>
            </div><!-- .form-group -->
        </div><!-- .col -->

        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Ваш email *</label>
                <input type="email" id="email" name="email" class="form-input form-input--large form-input--border-c-alto" placeholder="Ваш email" required >
            </div><!-- .form-group -->
        </div><!-- .col -->

        <div class="col-md-12">
            <div class="form-group">
                <label for="message">Ваше сообщение</label>
                <textarea name="message" id="message" rows="10" class="form-input form-input--large form-input--border-c-alto" placeholder="Ваше сообщение"></textarea>
            </div><!-- .form-group -->
        </div><!-- .col -->

        <div class="col-md-12">
            <div class="form-group--submit">
                <button class="button button--large button--square button--primary" type="submit">Отправить сообщение</button>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</form>