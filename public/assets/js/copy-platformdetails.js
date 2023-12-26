// Function to copy table data
$(document).ready(function () {
    $('#example').DataTable()

    $('#platformsTable tr').find('th:eq(4), td:eq(4)').hide();

    $(document).on('click', '.copy-details', function () {
        var $row = $(this).closest('tr'); // Get the parent row

        // Define the placeholders
        var placeholders = {
            '{Platform Name}': $row.find('td').eq(1).text().trim(),
            '{Platform link}': $row.find('td').eq(4).text().trim(),
            '{platform_username}': $row.find('td').eq(2).text().trim(),
            '{platform_password}': $row.find('td').eq(3).text().trim(),
            '{Static Content}': `1 point @ 1 Rupees Balance 
Fancy Minimum Bet 100
Match Minimum Bet 100

*For deposit -
7208306079

*For withdrawal -
7208611809

*for customer support -
+1(409) 419 - 6217 `
        };

        // Create the template
        var template =
            `💰 ${placeholders['{Platform Name}']} 💰\n\nSite : ${placeholders['{Platform link}']}\n\nUser Id : ${placeholders['{platform_username}']}\nPassword : ${placeholders['{platform_password}']}\n\n${placeholders['{Static Content}']}`;

        // Attempt to use the Clipboard API
        if (navigator.clipboard) {
            navigator.clipboard.writeText(template).then(function () {
                alert('Content copied to clipboard:\n' + template);
            }).catch(function (err) {
                // If Clipboard API fails, try the alternative method
                alternativeCopyMethod(template);
            });
        } else {
            // If Clipboard API is not supported, try the alternative method
            alternativeCopyMethod(template);
        }
    });

    $(document).on('click', '.copy-details2', function () {
        var $row = $(this).closest('tr');
        
        // Define the placeholders and extract values from the table
        var placeholders = {
            '{Platform Name}': $row.find('td:contains("Platform Name")').next().text().trim(),
            '{Platform link}': $row.find('td:contains("Platform Url")').next().text().trim(),
            '{platform_username}': $row.find('td:contains("Platform UserName")').next().text().trim(),
            '{platform_password}': $row.find('td:contains("Platform Password")').next().text().trim(),
            '{Static Content}': '1 point @ 1 Rupees Balance\nFancy Minimum Bet 100\nMatch Minimum Bet 100\n\nFor deposit - 7208306079\nFor withdrawal - \n7208611809\n\nfor customer support - \n+1(409) 419 - 6217'
        };
        
        // Create the template
        var template = `💰 ${placeholders['{Platform Name}']} 💰\n\nSite : ${placeholders['{Platform link}']}\n\nUser Id : ${placeholders['{platform_username}']}\nPassword : ${placeholders['{platform_password}']}\n\n${placeholders['{Static Content}']}`;
    
        // Attempt to use the Clipboard API
        if (navigator.clipboard) {
            navigator.clipboard.writeText(template).then(function () {
                alert('Content copied to clipboard:\n' + template);
            }).catch(function (err) {
                // If Clipboard API fails, try the alternative method
                alternativeCopyMethod(template);
            });
        } else {
            // If Clipboard API is not supported, try the alternative method
            alternativeCopyMethod(template);
        }
    });
    

    // Function for the alternative copy method
    function alternativeCopyMethod(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();

        try {
            document.execCommand("copy");
            alert('Content copied to clipboard (alternative method):\n' + text);
        } catch (err) {
            alert('Failed to copy content to clipboard using the alternative method: ' + err);
        } finally {
            document.body.removeChild(textArea);
        }
    }
});
