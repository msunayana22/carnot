<?php

$xml = new SimpleXMLElement('https://api.data.gov.in/resource/9ef84268-d588-465a-a308-a864a43d0070?api-key=579b464db66ec23bdd000001cdd3946e44ce4aad7209ff7b23ac571b&format=xml&offset=0&limit=10', 0, TRUE);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      h3 {color: red;}
      h4 {color: blue;}
      body { background-color: powderblue;}
        </style>
      }
    <title>Carnot</title>
  </head>
  <body>
  <h3 align="center"> LATEST GROCERY PRICE</h3>
<h4 align="center">System Status: <span id="online-status" /></h4>
<br>
<form name="info" align="center">
  <label>
    Search by District:<input class="m-2" type="text" name="searchd" id="myInputd">
    Search by Village:<input class="m-2" type="text" name="searchv" id="myInputv">
  </label>
  </form>
<table id="dataTables" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">timestamp</th>
      <th scope="col">state</th>
      <th scope="col">district</th>
      <th scope="col">market</th>
      <th scope="col">commodity</th>
      <th scope="col">variety</th>
      <th scope="col">arrival_date</th>
      <th scope="col">min_price</th>
      <th scope="col">max_price</th>
      <th scope="col">modal_price</th>
    </tr>
  </thead>
  <tbody id="tbody-id">
<?php foreach ($xml->records->item as $Element) :?>
    <tr class="body-row">
      <td class="timestamp"><?php echo $Element->timestamp; ?></td>
      <td class="state"><?php echo $Element->state; ?></td>
      <td class="district"><?php echo $Element->district; ?></td>
      <td class="market"><?php echo $Element->market; ?></td>
      <td class="commodity"><?php echo $Element->commodity; ?></td>
      <td class="variety"><?php echo $Element->variety; ?></td>
      <td class="arrival_date"><?php echo $Element->arrival_date; ?></td>
      <td class="min_price"><?php echo $Element->min_price; ?></td>
      <td class="max_price"><?php echo $Element->max_price; ?></td>
      <td class="modal_price"><?php echo $Element->modal_price; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
<?php echo"
<script>
  const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent; 
  const comparer = (idx, asc) => (a, b) => ((v1, v2) => v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2) )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

   document.querySelectorAll('th').forEach(th => 
     th.addEventListener('click', (() => { 
       const table = th.closest('table'); 
       Array.from(table.querySelectorAll('tr.body-row')).sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc)).forEach(tr => table.appendChild(tr)); 
       })
      )
    );
 </script>" 
  ?>
  <?php echo"
  <script>
    function myFunction(index=2) {  
    // Declare variables  
    var input, filter, table, tr, td, i, txtValue; 
    if(index === 2){
      input = document.getElementById('myInputd');  
    }else{
    input = document.getElementById('myInputv');  
    } 
    filter = input.value.toLowerCase();  
    table = document.getElementById('dataTables');  
    tr = table.getElementsByTagName('tr');
  // Loop through all table rows, and hide those who don't match the search query  
  for (i = 0; i < tr.length; i++) { 
     td = tr[i].getElementsByTagName('td')[index];   
     if (td) {      
     txtValue = td.textContent || td.innerText;
           if (txtValue.toLowerCase().indexOf(filter) > -1) {
                   tr[i].style.display = '';
                         } 
          else {
                tr[i].style.display = 'none';
                }
              }
          }
        }
   document.getElementById('myInputd').addEventListener('keydown', function() {
    myFunction();
    });
    document.getElementById('myInputv').addEventListener('keydown', function() {
      myFunction(3);
    });
  </script>"
  ?>
  <?php echo"
  <script>
    window.addEventListener('online', updateStatus);
    window.addEventListener('offline', updateStatus);
    updateStatus();
    function updateStatus(event) {
      var condition = navigator.onLine ? 'online' : 'offline';
      var displayOnlineStatus = document.getElementById('online-status');
      displayOnlineStatus.innerHTML = condition;
    };
  </script>"
  ?>
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
