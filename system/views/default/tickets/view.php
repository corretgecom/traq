<div id="page-content">
	<div id="ticket-info">
		<h2 id="ticket-summary"><?php echo $ticket->summary; ?></h2>
		
		<h3><?php echo l('description'); ?></h3>
		<?php echo $ticket->body; ?>
	</div>
</div>