
<div id="largeModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 style="font-size: 1.75rem; text-align: center;">Соглашение об обработке персональных данных</h3>
                <p>
                    Данное соглашение об обработке персональных данных разработано в соответствии с законодательством Российской Федерации. <br>
                    Все лица заполнившие сведения, составляющие персональные данные на данном сайте, а также разместившие иную информацию обозначенными действиями подтверждают свое согласие на обработку персональных данных и их передачу оператору обработки персональных данных. <br>
                    Под персональными данными Гражданина понимается нижеуказанная информация: <br>
                    - общая информация (Имя, телефон и адрес электронной почты); <br>
                    - посетители сайта направляют свои персональные данные для получения услуг расчёта стоимости заказа. <br>
                    Гражданин, принимая настоящее Соглашение, выражают свою заинтересованность и полное согласие, что обработка их персональных данных может включать в себя следующие действия: сбор, систематизацию,
                    накопление, хранение, уточнение (обновление, изменение), использование, уничтожение. <br>
                    Гражданин гарантирует: информация, им предоставленная, является полной, точной и достоверной; припредоставлении информации не нарушается действующее законодательство Российской Федерации,
                    законные права и интересы третьих лиц; вся предоставленная информация заполнена Гражданина в
                    отношении себя лично.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="button button--large button--square button--primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<!-- Форма обратной связи -->
<div id="largeModalForm" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 class="page-section__title">Обратная связь</h2>

                @include('pages.form')
                
            </div>

            <div class="modal-footer">
                <button type="button" class="button button--large button--square button--primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
