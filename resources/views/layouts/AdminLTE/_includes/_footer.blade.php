<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<?php
			$data = date('D');
			$mes = date('M');
			$dia = date('d');
			$ano = date('Y');

			$semana = array(
				'Sun' => 'Domingo', 
				'Mon' => 'Segunda-Feira',
				'Tue' => 'Terça-Feira',
				'Wed' => 'Quarta-Feira',
				'Thu' => 'Quinta-Feira',
				'Fri' => 'Sexta-Feira',
				'Sat' => 'Sábado'
			);

			$mes_extenso = array(
				'Jan' => 'Janeiro',
				'Feb' => 'Fevereiro',
				'Mar' => 'Março',
				'Apr' => 'Abril',
				'May' => 'Maio',
				'Jun' => 'Junho',
				'Jul' => 'Julho',
				'Aug' => 'Agosto',
				'Nov' => 'Novembro',
				'Sep' => 'Setembro',
				'Oct' => 'Outubro',
				'Dec' => 'Dezembro'
			);

			echo "<b>".$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}.</b>";
		?>
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">{!! \App\Models\Config::find(1)->app_name !!}</a></strong>.
</footer>