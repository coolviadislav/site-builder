<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="form-index-wrapper">
				<div class="form-index-wrapper__text">
					Заказать уборку помещения
				</div>

				<form method="POST" action="form.php">
					<div class="form-group">
				        <label>Имя</label>
				        <input name="text" type="name" class="form-control">
				    </div>

				    <div class="form-group">
				        <label>Телефон*</label>
				        <input name="telephone" type="telephone" class="form-control" placeholder="+7 (___) ___-__-__" required="">
				    </div>

				    <button type="submit" class="btn btn-block btn-lg btn-primary mb-1">
				        Узнать цену  
				    </button>

				    <p class="text-muted text-center">
				        Перезвоним в течение 10 минут
				    </p>
				</form>                        
			</div>
		</div>
		<div class="col-md-7">
			<div class="text-index__title">
                Узнайте цену прямо сейчас
			</div>

			<p>
				<strong>Свяжитесь с нами по телефону:</strong>
				<a href="tel:{{ $config['contact']['phone'] }}">{{ $config['contact']['phone'] }}</a>
			</p>
			<p>
				Оставьте заявку по телефону или заполните анкету на сайте. Менеджер уточнит информацию и договорится о времени и стоимости уборки.
			</p>
		</div>
	</div>
</div>