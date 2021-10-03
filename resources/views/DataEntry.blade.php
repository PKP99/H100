<!DOCTYPE html>
<html>
    <head>
        <title>Healthify100</title>
    </head>
    <body>
        <form action="success1" method="POST" >
            @csrf
            <h2>Enter Food Details</h2>
            <label for="fname">Food Name:-</label>
            <input type="text" id="fname" name="fname" value=""><br>
            <label for="ftype">Food Type:-</label>
            <select id="ftype" name="ftype">
               <option value="Rice">Rice</option>
               <option value="Daal">Daal</option>
               <option value="Roti">Roti</option>
               <option value="Sabzi">Sabzi</option>
               <option value="Snack">Snack</option>
               <option value="Drinks">Drinks</option>
               <option value="Uncooked">Uncooked</option>
               <option value="Fruit">Fruit</option>
               <option value="Sweets">Sweets</option>
            </select><br>
            <label for="mtype">Measurement Type:-</label>
            <select id="mtype" name="mtype">
               <option value="Plate">Plate</option>
               <option value="Katori">Katori</option>
               <option value="Piece">Piece</option>
               <option value="250ml">250ml</option>
               <option value="100gm">100gm</option>
               <option value="Spoon">Spoon</option>
               <option value="Slice">Slice</option>
               <option value="Glass">Glass</option>
               <option value="Cup">Cup</option>
               <option value="KG">KG</option>
            </select><br>
            <label for="cvalue">Calorific Value:-</label>
            <input type="number" id="cvalue" name="cvalue" value=""><br><br>

            <input type="submit" value="Submit">
        </form>

        <form action="success2" method="POST" >
            @csrf
            <h2>Enter Workout Details</h2>
            <label for="wname">Workout Name:-</label>
            <input type="text" id="wname" name="wname" value=""><br>
            <label for="wfreq">Workout Frequency:-</label>
            <select id="wfreq" name="wfreq">
               <option value="Ultra Low Intensity">Ultra Low Intensity</option>
               <option value="Low Intensity">Low Intensity</option>
               <option value="Moderate Intensity">Moderate Intensity</option>
               <option value="High Intensity">High Intensity</option>
               <option value="Ultra High Intensity">Ultra High Intensity</option>
            </select><br>
            <label for="cbiv">Calorie_burning_index_value:-</label>
            <input type="number" id="cbiv" name="cbiv" value="" step="any" ><br><br>

            <input type="submit" value="Submit">
        </form>
    </body>    
</html> 
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>