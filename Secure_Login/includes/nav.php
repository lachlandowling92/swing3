<nav>
	<h2>Menu</h2>
	<?php
	$item1 = array('location'=>'/index.php?location=page1&action=view', 'link' => 'Page 1');
	$item2 = array('location'=>'/index.php?location=page2&action=view', 'link' => 'Page 2');
	$menu = array($item1, $item2);
	?>
	<ul class="menu">
		<?php foreach($menu as $menuItem) : ?>
		<li>
			<a href="<?php echo SITE_ROOT . $menuItem['location']; ?>">
				<?php  echo $menuItem['link']; ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</nav>
<?php echo "\n"; ?>