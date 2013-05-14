<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
	<h1><?= Configure::read('TwitterBootstrap.App.name') ?></h1>
	<p>
		Bacon ipsum dolor sit amet brisket venison excepteur filet mignon velit chicken. Flank corned beef incididunt, swine duis pig filet.
	</p>
    <p><?php echo $this->Html->link('Learn more &raquo;',array('admin'=>false,'plugin'=>null,'controller'=>'pages','action'=>'display','about'), array('class'=>'btn btn-primary btn-large', 'escape'=>false))?></p>
</div>

<!-- Example row of columns -->
<div class="row">
    <div class="span3">
	    <h2>Double</h2>
	    <p>
		    Bacon ipsum dolor sit amet brisket venison excepteur filet mignon velit chicken. Flank corned beef incididunt, swine duis pig filet mignon ribeye shankle drumstick.
		    Turkey nostrud pastrami non. In tenderloin velit ham short ribs venison non magna beef ribs.
	    </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span3">
	    <h2>Bacon</h2>
	    <p>
		    Bacon ipsum dolor sit amet brisket venison excepteur filet mignon velit chicken. Flank corned beef incididunt, swine duis pig filet mignon ribeye shankle drumstick.
		    Turkey nostrud pastrami non. In tenderloin velit ham short ribs venison non magna beef ribs.
	    </p>        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span3">
	    <h2>Cheese</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span3">
	    <h2>Burger</h2>
	    <p>
		    Bacon ipsum dolor sit amet brisket venison excepteur filet mignon velit chicken. Flank corned beef incididunt, swine duis pig filet mignon ribeye shankle drumstick.
		    Turkey nostrud pastrami non. In tenderloin velit ham short ribs venison non magna beef ribs.
	    </p>        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
</div>
