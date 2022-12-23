 $('#export_pdf').on('click', function(e) {
        e.preventDefault();
        var pdf_name = $(this).attr('data-pdfname');
        var pdf_content = $('#pdf_content').html();
        $.ajax({
            url: '../../common/service.php?j=export_pdf',
            method: 'POST',
            xhrFields: {
                responseType: 'blob'
            },
            data: {
                pdf_name: pdf_name,
                pdf_content: pdf_content
            },
            success: function(data) {
                var a = document.createElement('a');
                var url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = pdf_name + '.pdf';
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            }
        });
    });
    $('#export_excel').on('click', function(e) {
        e.preventDefault();
        var pdf_name = $(this).attr('data-pdfname');
        var pdf_content = $('.get_excel');
        if (pdf_content && pdf_content.length) {
            $(pdf_content).table2excel({
                name: pdf_name,
                filename: pdf_name,
            });
        }
    });

