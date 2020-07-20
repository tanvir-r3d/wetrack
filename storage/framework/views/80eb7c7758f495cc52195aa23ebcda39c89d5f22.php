<script src="/js/all.js"></script>
<script src="toastr.min.js"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<?php if(Auth::check()): ?>
{
    <script>
    if(navigator.geolocation)
    {
        setInterval(function(){navigator.geolocation.getCurrentPosition(showPosition);}, 3000);
    }
    else
    {
        console.log("Geo Permission Disabled");
    }
        function showPosition(position)
        {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            $.ajax({
            url:"<?php echo e(route('track_create')); ?>",
            type:'post',
            data:{'latitude':latitude,'longitude':longitude,'_token': '<?php echo e(csrf_token()); ?>'}
            });
        }
    </script>
}
<?php else: ?>
<?php endif; ?>

<?php echo $__env->yieldContent('script'); ?>
</body>
<!-- END: Body-->

</html><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/layouts/app_js.blade.php ENDPATH**/ ?>