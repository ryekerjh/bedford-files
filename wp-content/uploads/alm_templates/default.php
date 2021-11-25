<a class="archive-item" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('archive', ['class'=>'archive-item-image']); ?>
						<div class="archive-item-meta flex align-center justify-center">
							<div class="archive-item-title"><?php the_title(); ?></div>
						</div>
					</a>