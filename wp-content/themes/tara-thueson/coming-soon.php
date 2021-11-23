<style type="text/css">
#logo-construction {
	position: fixed;
	background: white;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
    text-align: center;
    z-index: 500;
}

#logo-construction .inner {
    text-align: center;
}

#logo-construction .logo {
    display: inline-block;
    width: 50%;
    margin: 20px auto;
}

#logo-construction .message {
    width: 100%;
}
</style>

<?php if(!is_user_logged_in()) { ?>

<section id="logo-construction">
    <div class="inner">
        <div class="logo">
            <img src="<?php the_field('logo','option'); ?>">
        </div>
        <div class="message"><?php the_field('coming_soon_message','option'); ?></div>
    </div>
</section>

<?php } ?>