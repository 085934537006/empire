<script>
function deleteConfirmation(id)
{
	swal({
		title: 'Konfirmasi',
		text: '<?php echo $confirmmsg ?>',
		icon: 'warning',
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {
			window.location.href = "<?php echo site_url($url)+'id'; ?>";
		}
	});
}
</script>