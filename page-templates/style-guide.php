<?php
/*
Template Name: Style Guide
*/

add_action('wp_enqueue_scripts', 'enqueue_styleguide_scripts');
function enqueue_styleguide_scripts()
{
    wp_enqueue_style('style-guide', get_stylesheet_directory_uri() . '/css/style-guide.css');
}

get_header();
?>
<section id="section-headers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="header medium">Headers</h1>
                <h1 class="header largest">Header Largest<span class="subheader">Subheader Text</span></h1>
				<h2 class="header large">Header Large<span class="subheader">Subheader Text</span></h2>
				<h3 class="header medium">Header Medium<span class="subheader">Subheader Text</span></h3>
				<h4 class="header small">Header Small<span class="subheader">Subheader Text</span></h4>
				<h5 class="header smallest">Header Smallest<span class="subheader">Subheader Text</span></h5>
            </div>
        </div>
    </div>
</section>
<section id="section-paragraph-text" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header medium">Paragraph text</h1>

				<p>
					Doris and Bethel are twin town sites in Buchanan County, Iowa, United States, both located just north of Highway 939
					in central Buchanan County near Independence. Founded as whistle-stops along the Chicago and North Western Railway,
					the sites are abandoned today. Galbraith's Rail Map of Iowa from 1897 shows no towns located between Independence and Winthrop.
					However, by the early 1900s, a number of Iowa newspapers were reporting on events occurring in Doris.
				</p>

				<p>
					In 1917 the Waterloo Times-Tribune reported a story about two men fleeing from the law in Independence; the thieves were
					apprehended in Doris. Doris was the site of a freight train collision on September 30, 1922, when a train leaving from
					Masonville rear ended another train at the Doris siding. The accident resulted in the death of one conductor and the injury
					of two others, and the derailment of both trains. The town sites were located three fourths of a mile apart, Doris at the
					junction of Highway 939 and North Doris Avenue, an unimproved and unpaved gravel road located between Winthrop and Independence.
				</p>
			</div>
		</div>
	</div>
</section>
<section id="section-buttons">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header medium">Buttons</h1>

				<div id="solid-buttons" class="button-container">
					<a href="#" class="btn btn-default primary">Solid Green</a>
					<a href="#" class="btn btn-default secondary">Solid Red</a>
					<a href="#" class="btn btn-default tertiary">Solid Blue</a>
					<a href="#" class="btn btn-default quaternary">Solid Grey</a>
				</div>
				<div id="border-buttons" class="button-container">
					<a href="#" class="btn btn-border primary">Outline Green</a>
					<a href="#" class="btn btn-border secondary">Outline Red</a>
					<a href="#" class="btn btn-border tertiary">Outline Blue</a>
					<a href="#" class="btn btn-border quaternary">Outline White</a>
				</div>
				<div id="filter-buttons" class="button-container">
					<a href="#" class="btn btn-filter">Filter Button</a>
				</div>
				<div id="social-buttons" class="button-container">
					<a href="#" class="btn btn-social facebook"></a>
					<a href="#" class="btn btn-social twitter"></a>
					<a href="#" class="btn btn-social google-plus"></a>
					<a href="#" class="btn btn-social vimeo"></a>
					<a href="#" class="btn btn-social youtube"></a>
				</div>
				<div id="slideshow-nav-buttons" class="button-container">
					<a href="#" class="btn slideshow-nav-button previous"></a>
					<a href="#" class="btn slideshow-nav-button next"></a>
				</div>
                <div id="continue-button" class="button-container">
                    <a href="#" class="btn btn-continue-arrow">Continue</a>
                </div>
			</div>
		</div>
	</div>
</section>
<section id="section-inputs" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="header medium">Inputs</h1>

				<div id="text-area">
					<form>
						<div class="checkbox">
							<label for="checkbox-1">
								<input type="checkbox" id="checkbox-1" name="styleguide-checkbox"/>
								<span></span>Checkbox
							</label>
						</div>
						<div class="radio">
							<label for="radio-1">
								<input type="radio" id="radio-1" name="styleguide-radio"/>
								<span></span>Radio Button
							</label>
						</div>
						<div class="form-group">
							<textarea placeholder="Text Area" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Text Input"/>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Text w/ button"/>
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-default solid primary"/>
                                </span>
							</div>
						</div>
						<div class="form-group has-error">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Text w/ button"/>
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-default solid primary" disabled="disabled"/>
                                </span>
							</div>
						</div>
                        <div class="form-group">
							<select class="form-control select2">
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
								<option>Option 4</option>
								<option>Option 5</option>
							</select>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="general-controls" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="header medium">General Controls</h1>

				<div class="progress progress-striped">
					<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="team-member-photos" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header medium">Team Member Photos</h1>

				<div class="team-member-photo">
					<img src="http://invisiblechildren.dev/wp-content/uploads/2013/03/jasonrussell_color.png"/>

					<div class="overlay">
						<div class="content">
							<span class="team-member-name">Jason Russell</span>
							<span class="team-member-title">Chief Creative Officer</span>
						</div>
					</div>
				</div>
				<div class="team-member-photo small">
					<img src="http://invisiblechildren.dev/wp-content/uploads/2013/03/jasonrussell_color.png"/>
				</div>
			</div>
		</div>
</section>
<?php get_footer() ?>