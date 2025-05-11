<?php if (have_rows('flexible_content')):
    while (have_rows('flexible_content')): the_row();
        if (get_row_layout() === 'text_media'):
            include('text-media/text-media.php');
        elseif (get_row_layout() === 'gallery'):
            include('gallery/gallery.php');
        elseif (get_row_layout() === 'slider'):
            include('slider/slider.php');
        elseif (get_row_layout() === 'image'):
            include('image/image.php');
        elseif (get_row_layout() === 'title-paragraph'):
            include('title-paragraph/title-paragraph.php');
        elseif (get_row_layout() === 'paragraphs-list'):
            include('paragraphs-list/paragraphs-list.php');
        elseif (get_row_layout() === 'skills'):
            include('skills-display/skills-display.php');
        endif;
    endwhile;
endif;