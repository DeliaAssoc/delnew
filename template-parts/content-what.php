<?php
/**
 * Template part for displaying content What We Do Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Delia_Associates
 */

?>

<!-- Check for Page Banner -->
<?php if ( get_field( 'page_banner_top' ) ) : ?>
    <div class="page-banner" style="background-image:url('<?php the_field( 'page_banner_top' ); ?>');"></div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'p45' ); ?>>

    <section class="intro-content ">
        <div class="constrain">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
        <div class="constrain">
            <?php the_content(); ?>
        </div>
    </section>

    <section class="what-boasts p45">
		<div class="constrain">
			<?php if ( have_rows( 'boasts' ) ) : ?>
				<div class="boast-selectors flexxed">
					<?php $dRef = 1; ?>
					<?php while ( have_rows( 'boasts' ) ) : the_row(); ?>
						<div class="boast-selector-target" data-ref="boast<?php echo $dRef; ?>">
							<?php $bstImage = get_sub_field( 'boast_featured_image' ); ?>
							<div class="boast-img-wrapper">
								<img src="<?php echo $bstImage[ 'url' ]; ?>" alt="<?php echo $bstImage[ 'alt' ]; ?>">
							</div>
							<h3 class="boast-selector-title">
								<?php the_sub_field( 'boast_title' ); ?>
							</h3>
						</div>
						<?php $dRef++; ?>
					<?php endwhile; ?>
				</div>
				<div class="boasts-content">
				<?php $dRef = 1; ?>
					<?php while ( have_rows( 'boasts' ) ) : the_row(); ?>
						<div class="boast-content flexxed" id="boast<?php echo $dRef; ?>">
							<div class="content-img">
								<?php $bcImage = get_sub_field( 'boast_content_image' ); ?>
								<img src="<?php echo $bcImage[ 'url' ]; ?>" alt="<?php echo $bcImage[ 'alt' ]; ?>">
							</div>
							<div class="boast-text-content">
								<?php the_sub_field( 'boast_content' ); ?>
								<div class="boast-text-btns flexxed">
									<?php if ( get_sub_field( 'boast_case_study_link' ) ) : ?>
										<a class="boast-btn btn red-bg" href="<?php the_sub_field( 'boast_case_study_link' ); ?>"><?php the_sub_field( 'boast_case_study_link_text' ); ?> ></a>
									<?php endif; ?>
									<?php if ( get_sub_field( 'boast_contact_link' ) ) : ?>
										<a class="boast-btn btn red-brdr" href="<?php the_sub_field( 'boast_contact_link' ); ?>"><?php the_sub_field( 'boast_contact_link_text' ); ?> ></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php $dRef++; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section style="background-image: url( '<?php the_field ('steps_section_background_image' ); ?>' );" class="steps p45">
		<div class="constrain">
			<h3><?php the_field( 'steps_section_title' ); ?></h3>
			<div class="steps-wrapper flexxed">
				<?php if ( have_rows( 'steps' ) ) : ?>
					<?php while ( have_rows( 'steps' ) ) : the_row(); ?>
						<?php $sImage = get_sub_field( 'step_icon' ); ?>
						<div class="step-item">
							<img class="step-icon" src="<?php echo $sImage[ 'url' ]; ?>" alt="<?php echo $sImage[ 'alt' ]; ?>">
							<div class="step-title"><?php the_sub_field( 'step_title' ); ?></div>
							<div class="step-copy"><?php the_sub_field( 'step_copy' ); ?></div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="affiliates p45">
		<div class="constrain">
		<h3><?php the_field( 'partners_section_title' ); ?></h3>
			<div class="aff-logos flexxed">
			<?php if ( have_rows( 'partners' ) ) : ?>
				<?php while ( have_rows( 'partners' ) ) : the_row(); ?>
					<?php $aLogo = get_sub_field( 'partner_logo' ); ?>
					<img src="<?php echo $aLogo[ 'url' ]; ?>" alt="<?php echo $aLogo[ 'alt' ]; ?>">
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		</div>
    </section>
</article><!-- #post-<?php the_ID(); ?> -->

<!-- CLIENT SAMPLES -->
<section id="client-samples" class="client-samples">
    <ul class="flexxed">
    <?php
        $query = new WP_Query( array( 'post_type' => 'portfolios', 'showposts' => 4, 'orderby' => 'rand' ) );
            
        while ( $query->have_posts() ) : $query->the_post(); ?>

            <li class="portfolio">

                <!-- post thumbnail -->
                <a class="dark-mask" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
                </a>
                <!-- /post thumbnail -->
            </li>	

        <?php endwhile;
        wp_reset_query();
    ?>
    </ul>
    <div>
        <a class="more-work" href="/work/">See More Award Winning Work ></a>
    </div>
</section>
<!-- CLIENT SAMPLES -->


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="HJYK87VMG3ZEY">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="HDAP is a 501(c)3 and Registered Charity!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<!-- BRAND ASSESSMENT FORM MODULE -->
<section class="brand-assessment-section red-bg p45">
    <div class="brand-assessment-form constrain flexxed red-bg">
        <div class="ba-intro">
            <h3>
                Ready to have a conversation?
            </h3>
            <div class="ba-text">
                We can take your brand to the next level.
            </div>
        </div>

        <div class="ba-form">
            <!-- SharpSpring Form for Brand Assessment Form  -->
            <script type="text/javascript">
                var ss_form = {'account': 's7QwAQA', 'formID': 'SzFNTDYxNU7SNTUxTNM1SUw20000NUzWTTUxMLU0MzY3M7QwAQA'};
                ss_form.width = '100%';
                ss_form.height = '1000';
                ss_form.domain = 'app-K6AVT0.marketingautomation.services';
                // ss_form.hidden = {'Company': 'Anon'}; // Modify this for sending hidden variables, or overriding values
            </script>
            <script type="text/javascript" src="https://koi-K6AVT0.marketingautomation.services/client/form.js?ver=1.1.1"></script>
        </div>
    </div><!-- .contain.flexxed -->
</section>
<!-- BRAND ASSESSMENT FORM MODULE -->