<?php
    /**
     * Template part for displaying single-post
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    get_header();

    use AMDWPTheme\Buttons;
    use AMDWPTheme\Content;
    use AMDWPTheme\Media;

    $id = get_the_ID();

    $header = get_field('header', $id);
    $small_header = get_field('small_header' , $id);
    $author_id = get_post_field('post_author', $id);
    $category = get_the_category($id);
    $avatar_image = get_field('user_avatar', 'user_'.$author_id);
    $author_name = get_the_author_meta('first_name', $author_id);
    $datePost = get_the_date('d.m.Y');
    $add_banner = get_field('add_banner', $id);

    $header_sidebar = get_field('header_sidebar',$id);
    $choose_posts = get_field('choose_posts', $id);

    $previous_post_url = get_permalink(get_previous_post()->ID);

    $previous_post = get_previous_post();
        if ($previous_post) {
            $previous_post_url = get_permalink($previous_post->ID);
        } else {
            // Handle the case when there is no next post
            $previous_post = '#'; // Or any default URL
        }

    // Get next post permalink
    $next_post = get_next_post();
    if ($next_post) {
        $next_post_url = get_permalink($next_post->ID);
    } else {
        // Handle the case when there is no next post
        $next_post_url = '#'; // Or any default URL
    }
    $excerpt = get_the_excerpt();
?>

<article id="post-<?= the_ID();?>" class="single--post mt-h">
    <div class="container">
        <div class="breadcrumb md-show flex flex-row p-rel gap-5 ai-c sm-o-x-scroll sm-o-y-clip">
            <?= get_template_part('parts/core/breadrcumb');?>
        </div>
        <div class="grid-columns gap-y-30 sm-gap-y-15">
            <div class="grid col-2-9 col-md-1-8 col-sm-1-6">
                <div class="flex flex-col p-rel gap-30">
                    <div class="breadcrumb md-hide flex flex-row p-rel gap-5 ai-c">
                        <?= get_template_part('parts/core/breadcrumb');?>
                    </div>
                    <div class="flex flex-col p-rel gap-20">
                        <?php  if(!empty($small_header)): ?>
                            <div class="small-header"><?= $small_header;?></div>
                        <?php endif;?>
                        <div class="main-header h2">
                            <?php 
                                if(!empty($header)) {
                                    echo $header;
                                } else {
                                    the_title('<h1>','</h1>');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid col-1-12 col-md-1-8 col-sm-1-6">
                <div class="single--post-banner">
                    <div class="single--post-banner-cat category-box">
                        <?= $category[0]->name;?>
                    </div>
                    <?php if(!empty($add_banner['url'])) { ?>
                        <?= Media::banner($add_banner);?>
                    <?php } else { ?>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="sp"></div>
        <div class="grid-columns single--post-content">
            <div class="grid col-2-8 col-md-1-8 col-sm-1-6">
                <div class="flex flex-col p-rel snigle--post-content-description">
                    <?php if(!empty($excerpt)) :?>
                        <div class="excerpt h4">
                            <?= the_excerpt(); ?>
                        </div>
                    <?php endif;?>
                    <div class="description">
                        <?= the_content();?>
                    </div>
                    <div class="single--post-navigation flex flex-row jc-sb mt-50">
                        <div class="previous-post">
                            <?php if ($previous_post_url) : ?>
                                <a href="<?= $previous_post_url;?>">
                                    <div class="post-link-box-prev flex flex-row p-rel ai-c gap-10">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                                                <path d="M6 1L2 5L6 9" stroke="#D57300" stroke-width="2"/>
                                            </svg>
                                        </span>
                                        <span class="text">
                                            <?= pll_e('Poprzedni wpis', 'AMD WP Theme');?>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="next-post">
                            <?php if ($next_post_url) : ?>
                                <a href="<?= $next_post_url;?>">
                                    <div class="post-link-box-next flex flex-row p-rel ai-c gap-10">
                                        <span class="text">
                                            <?= pll_e('Następny wpis', 'AMD WP Theme');?>
                                        </span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                                                <path d="M1 1L5 5L1 9" stroke="#D57300" stroke-width="2"/>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid col-10-12 col-md-1-8 col-sm-1-6 sm-mt-30">
                <div class="single--post-sidebar sidebar flex flex-col p-rel gap-50">
                    <div class="main-header">
                        <?php
                            if(!empty($header_sidebar)) {
                                echo $header_sidebar;
                            } else {
                                echo 'Zobacz także';
                            }
                        ?>
                    </div>
                    <div class="sidebar-blocks flex flex-col p-rel gap-20">
                        <?php
                            if(!empty($choose_posts)) {
                                foreach($choose_posts as $post):
                                    setup_postdata($post);
                                    $idPost = get_the_ID();
                                    $category = get_the_category($idPost);
                                    $date_post = get_the_date('d.m.Y');
                                    $authorid = get_post_field('post_author', $idPost);

                                    $authorname = get_the_author_meta('first_name', $authorid);
                        ?>

                        <?php
                                endforeach;
                            } else {
                                $args = array(
                                    'post_type'     => 'post',
                                    'orderby'       => 'rand',
                                    'posts_per_page' =>  2,
                                );
                                $query = new WP_Query($args);
                                while($query->have_posts()):$query->the_post();
                                    $idPost = get_the_ID();
                                    $date_post = get_the_date('d.m.Y');
                                    $authorid = get_post_field('post_author', $idPost);
                                    $category = get_the_category($idPost);
                                    $authorname = get_the_author_meta('first_name', $authorid);
                        ?>

                        <?php
                                endwhile;
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sp"></div>
    <?php
        while(have_rows('choose_section', $id)):the_row();
            $layout = get_row_layout();
            get_template_part('parts/sections/' . $layout);
        endwhile;
    ?>
</article>

<?php
    get_footer();