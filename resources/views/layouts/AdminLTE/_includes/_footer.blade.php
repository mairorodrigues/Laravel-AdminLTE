<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<?php
			$data = date('D');
			$mes = date('M');
			$dia = date('d');
			$ano = date('Y');

			$semana = array(
				'Sun' => 'Sunday', 
				'Mon' => 'Monday',
				'Tue' => 'Tuesday',
				'Wed' => 'Wednesday',
				'Thu' => 'Thursday',
				'Fri' => 'Friday',
				'Sat' => 'Saturday'
			);

			$mes_extenso = array(
				'Jan' => 'January',
				'Feb' => 'February',
				'Mar' => 'March',
				'Apr' => 'April',
				'May' => 'May',
				'Jun' => 'June',
				'Jul' => 'July',
				'Aug' => 'August',
				'Nov' => 'November',
				'Sep' => 'September',
				'Oct' => 'October',
				'Dec' => 'December'
			);

			echo "<b>".$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}.</b>";
		?>
	</div>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">{!! \App\Models\Config::find(1)->app_name !!}</a></strong>.
</footer>