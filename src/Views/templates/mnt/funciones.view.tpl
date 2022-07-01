<h1>Trabajar con Funciones</h1>
<section>

</section>
<section>
  <table>
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th><a href="index.php?page=Mnt-Funcion&mode=INS">Nuevo</a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach Funciones}}
      <tr>
        <td>{{fncod}}</td>
        <td> <a href="index.php?page=Mnt-Funcion&mode=DSP&id={{fncod}}">{{fndsc}}</a></td>
        <td>{{fnest}}</td>
        <td>{{fntyp}}</td>
        <td>
          <a href="index.php?page=Mnt-Funcion&mode=UPD&id={{fncod}}">Editar</a>
          &NonBreakingSpace;
          <a href="index.php?page=Mnt-Funcion&mode=DEL&id={{fncod}}">Eliminar</a>
        </td>
      </tr>
      {{endfor Funciones}}
    </tbody>
  </table>
</section>