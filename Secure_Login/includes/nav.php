<nav>
	<?php
	$item1 = array('location'=>'/index.php?location=page1&action=view', 'link' => 'Login');
	$item2 = array('location'=>'/index.php?location=page2&action=view', 'link' => 'Page 2');
	$item4 = array('location'=>'/index.php?location=page4&action=view', 'link' => 'Register');
	$menu = array($item1, $item2, $item4);
	?>
	<ul class="menu">
		<li>|</li>
		<?php foreach($menu as $menuItem) : ?>
		<li>
			<a href="<?php echo SITE_ROOT . $menuItem['location']; ?>">
				<?php  echo $menuItem['link']; ?>
			</a>
		</li>
		<li>|</li>
		<?php endforeach; ?>
	</ul>
</nav>
		<br/>
<?php echo "\n"; ?>