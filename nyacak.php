<script type="text/javascript" src="js/jquery.min.js"></script>
    
    <form action="nyacak.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" value="Upload File to Server">
</form>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>

<script type="text/javascript">
$(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
    });
}); 
</script>