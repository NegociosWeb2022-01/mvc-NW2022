<h1>Trabajar con Pianos</h1>
<section>

</section>
<section>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Descripcion</th>
        <th>Bio</th>
        <th>Sales</th>
        <th>Imguri</th>
        <th>Imgthb</th>
        <th>Precio</th>
        <th>Estado</th>
        <th><a href="index.php?page=Mnt-Piano&mode=INS">Nuevo</a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach Pianos}}
      <tr>
        <td>{{pianoid}}</td>
        <td> <a href="index.php?page=Mnt-Piano&mode=DSP&id={{pianoid}}">{{pianodsc}}</a></td>
        <td>{{pianobio}}</td>
        <td>{{pianosales}}</td>
        <td>{{pianoimguri}}</td>
        <td>{{pianoimgthb}}</td>
        <td>{{pianoprice}}</td>
        <td>{{pianoest}}</td>
        <td>
          <a href="index.php?page=Mnt-Piano&mode=UPD&id={{pianoid}}">Editar</a>
          &NonBreakingSpace;
          <a href="index.php?page=Mnt-Piano&mode=DEL&id={{pianoid}}">Eliminar</a>
        </td>
      </tr>
      {{endfor Pianos}}
    </tbody>
  </table>
</section>