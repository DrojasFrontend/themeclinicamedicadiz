<?php
    $hero = get_field('hero');
?>

<?php if (!empty($hero)): ?>
    <section class="bg-single-post" style="background-image: url('<?php echo esc_url($hero['url']); ?>');">
    </section>
<?php endif; ?>