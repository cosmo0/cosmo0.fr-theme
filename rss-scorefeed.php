<?php
/**
 * Template Name: Score RSS Template - Scorefeed
 */
$postCount = 200; // The number of posts to show in the feed
$posts = query_posts(array(
        'posts_per_page' => $postCount,
        'category__and' => array( 2, 3 ), // critique + nintendo-switch
        'category__not_in' => array( 38 ) // critique express
));
header('Content-Type: application/xml; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:wfw="http://wellformedweb.org/CommentAPI/"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:atom="http://www.w3.org/2005/Atom"
        xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
        xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
        <?php do_action('rss2_ns'); ?>>
<channel>
        <title><?php bloginfo_rss('name'); ?> - Feed</title>
        <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
        <link><?php bloginfo_rss('url') ?></link>
        <description><?php bloginfo_rss('description') ?></description>
        <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
        <language><?php echo get_option('rss_language'); ?></language>
        <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'monthly' ); ?></sy:updatePeriod>
        <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '2' ); ?></sy:updateFrequency>
        <?php while(have_posts()) : the_post(); ?>
                <item>
                        <title><?php the_title_rss(); ?></title>
                        <link><?php the_permalink_rss(); ?></link>
                        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
                        <dc:creator><?php the_author(); ?></dc:creator>
                        <guid isPermaLink="false"><?php the_guid(); ?></guid>
                        <description><![CDATA[<?php the_excerpt_rss() ?>]]></description>
                        <content:encoded><![CDATA[<?php the_excerpt_rss() ?>]]></content:encoded>
                        <note max="10"><?php the_field('note', get_the_ID()); ?></note>
                        <?php do_action('rss2_item'); ?>
                </item>
        <?php endwhile; wp_reset_postdata(); ?>
</channel>
</rss>
