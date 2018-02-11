<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Formulario</title>
</head>

<body>
  <form action="prueba.php" method="post" name="calculadora">
    <label>Introduzca los valores:</label><br>
    <input type="text" name="c1"><br><br>
    <input type="text" name="c2"><br><br>
    <input type="text" name="c3"><br><br>
    <label>Seleccione la operación: <br>
<select name="lista">

<option value="sumar">Suma</option>
<option value="restar">Resta</option>
<option value="dividir">División</option>
<option value="multiplicar">Multiplicación</option>

</select>
</label></br>
    </br>
    <input type="submit" name="Enviar">

  </form>
</body>

</html>