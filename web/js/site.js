$(document).ready(function() 
{
    $(".select2").select2();
    
    $(".export-booking-data").on('click', function (event) {
        exportTableToCSV.apply(this, [$('#booking-data'), 'Booking_Availability.csv']);
    });

    $("#area-avail").on('change', function(e)
    {
        val=$(this).val();
        $.ajax({
           url: "?r=ajax/fillworkspace",
           type: 'post',
           data: {areaid:val},
           success: function (data) {
              $('#workspace-avail').html(data);
              $('#workspace-avail').select2();
           }
        });
    });

    $('.rp-button').on('click', function(e)
    {
      e.preventDefault();
      email_val = $('.email-text').val();
      //alert(email_val);
        $.ajax({
           url: "?r=ajax/message",
           type: 'post',
           data: {email: $('.email-text').val()},
           success: function (data) {
              $('#show-message').html(data);
           }

        });
    });

    $('#book-room').on('click', function(e)
    {
        e.preventDefault();
        var list = [];
        $('.book-specific').find('input').each(function(e){
            var check = $(this)[0].checked; 
            if(check === true)
            {
              list.push($(this).attr('id'));
            }
        });
        // //alert(email_val);
        $.ajax({
           url: "?r=ajax/bookreservation",
           type: 'post',
           data: {list: list, start: $('#start_time').val(), end: $('#end_time').val()},
           success: function (data) {
           }

        });
    });

    $('#signup-form').on('beforeSubmit', function (e) {
      username = $('#available-username').val();
      email = $('#available-email').val();
        $.ajax({
            url: "?r=ajax/signupform",
            type: 'post',
            data: {username:username,email:email},
            success: function (data) {
                if(data!='')
                {
                  alert(data);
                  return false;
                }
            },
            error: function () {
                return false;
            }

        });
        return true;
    });

    function exportTableToCSV($table, filename) {
        var $rows = $table.find('tr'),
                
            tmpColDelim = String.fromCharCode(11), 
            tmpRowDelim = String.fromCharCode(0),
            colDelim = '","',
            rowDelim = '"\r\n"',
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                        $cols = $row.find('td , th');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                            text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
            .split(tmpRowDelim).join(rowDelim)
            .split(tmpColDelim).join(colDelim) + '"',
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
            $(this).attr({
                'download': filename,
                'href': csvData,
                'target': '_blank'
            });
    }
});

function showLogin() {
	document.getElementById('login-wrapper').style.display = "inline";
	document.getElementById('rp-wrapper').style.display = "none";
	document.getElementById('loginbutton').style.background = "#FCE6C9";
  document.getElementById('loginbutton').style.color = "#000";
	document.getElementById('rstPass').style.background = "#000";
  document.getElementById('rstPass').style.color = "#FFF";
}		
function showRP() {
	document.getElementById('login-wrapper').style.display = "none";
	document.getElementById('rp-wrapper').style.display = "inline";
	document.getElementById('loginbutton').style.background = "#000";
  document.getElementById('loginbutton').style.color = "#FFF";
	document.getElementById('rstPass').style.background = "#FCE6C9";
  document.getElementById('rstPass').style.color = "#000";
}
