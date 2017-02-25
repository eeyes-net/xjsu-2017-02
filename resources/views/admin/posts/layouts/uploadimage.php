<div style="display: none;">
    <form id="upload_form" target="upload_iframe" method="POST" enctype="multipart/form-data" action="/ueditor/php/controller.php?action=uploadimage">
        <input id="upload_file" type="file" accept="image/*" name="upfile">
    </form>
    <iframe id="upload_iframe" name="upload_iframe" style="display:none;width:0;height:0;border:0;margin:0;padding:0;position:absolute;"></iframe>
</div>
<script>
    ;
    (function () {
        var upload_iframe = document.getElementById('upload_iframe');
        upload_iframe.addEventListener('load', function () {
            var upload_iframe_body = (upload_iframe.contentDocument || upload_iframe.contentWindow.document).body;
            var responseText = upload_iframe_body.innerText || upload_iframe_body.textContent || "";
            var responseJsonObject = new Function("return " + responseText)();
            if ("SUCCESS" == responseJsonObject.state && responseJsonObject.url) {
                document.getElementById('picture').value = responseJsonObject.url;
                document.getElementById('picture_preview').src = responseJsonObject.url;
            }
        });
        document.getElementById('upload_file').addEventListener('change', function () {
            document.getElementById('upload_form').submit();
        });
        window.showUpload = function () {
            upload_file.click();
        }
    })();
</script>
