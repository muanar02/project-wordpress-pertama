    <!-- footer -->
    <footer class="footer mt-3 py-3 bg-dark text-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <span>&copy; <?= get_option('footer_copyright'); ?></span>
            </div>
            <div>
                <a href="<?= get_option('facebook'); ?>"><i class="fa fa-facebook-square text-white mr-2" aria-hidden="true" style="font-size:28px"></i></a>
                <a href="<?= get_option('twitter'); ?>"><i class="fa fa-twitter-square text-white" aria-hidden="true" style="font-size:28px"></i></a>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>