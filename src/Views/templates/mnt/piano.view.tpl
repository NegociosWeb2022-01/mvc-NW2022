<h1>{{mode_desc}}</h1>
<section>
  <form action="index.php?page=mnt_piano" method="post">
    <input type="hidden" name="mode" value="{{mode}}" />
    <input type="hidden" name="crsf_token" value="{{crsf_token}}" />
    <input type="hidden" name="pianoid" value="{{pianoid}}" />
   
    <fieldset>

      <label for="pianodsc">Descripcion</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianodsc" name="pianodsc" placeholder="Descripcion" value="{{pianodsc}}" />
      {{if error_pianodsc}}
        {{foreach error_pianodsc}}
          <div class="error">{{this}}</div>
        {{endfor error_pianodsc}}
      {{endif error_pianodsc}}
    </fieldset>

    <fieldset>
      <label for="pianobio">Biografia</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianobio" name="pianobio" placeholder="Biografia" value="{{pianobio}}" />
      {{if error_pianobio}}
          {{foreach error_pianobio}}
            <div class="error">{{this}}</div>
          {{endfor error_pianobio}}
      {{endif error_pianobio}}
    </fieldset>

     <fieldset>
      <label for="pianosales">Ventas</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianosales" name="pianosales" placeholder="Ventas" value="{{pianosales}}" />
      {{if error_pianosales}}
          {{foreach error_pianosales}}
            <div class="error">{{this}}</div>
          {{endfor error_pianosales}}
      {{endif error_pianosales}}
    </fieldset>

     <fieldset>
      <label for="pianoimguri">Imagen Pequeña</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianoimguri" name="pianoimguri" placeholder="imagen Pequeña" value="{{pianoimguri}}" />
      {{if error_pianoimguri}}
          {{foreach error_pianoimguri}}
            <div class="error">{{this}}</div>
          {{endfor error_pianoimguri}}
      {{endif error_pianoimguri}}
    </fieldset>

     <fieldset>
      <label for="pianoimgthb">Imagen Grande</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianoimgthb" name="pianoimgthb" placeholder="Imagen Grande" value="{{pianoimgthb}}" />
      {{if error_pianoimgthb}}
          {{foreach error_pianoimgthb}}
            <div class="error">{{this}}</div>
          {{endfor error_pianoimgthb}}
      {{endif error_pianoimgthb}}
    </fieldset>

       <fieldset>
      <label for="pianoprice">Precio</label>
      <input {{if readonly}}readonly{{endif readonly}} type="text" id="pianoprice" name="pianoprice" placeholder="Precio" value="{{pianoprice}}" />
      {{if error_pianoprice}}
          {{foreach error_pianoprice}}
            <div class="error">{{this}}</div>
          {{endfor error_pianoprice}}
      {{endif error_pianoprice}}
    </fieldset>


    <fieldset>
      <label for="pianoest">Estado</label>
      <select name="pianoest" id="pianoest" {{if readonly}}readonly disabled{{endif readonly}}>
        {{foreach pianoestArr}}
        <option value="{{value}}" {{selected}}>{{text}}</option>
        {{endfor pianoestArr}}
      </select>
    </fieldset>

  

    <fieldset>
      {{if showBtn}}
        <button type="submit" name="btnEnviar">{{btnEnviarText}}</button>
        &nbsp;
      {{endif showBtn}}
      <button name="btnCancelar" id="btnCancelar">Cancelar</button>
    </fieldset>
  </form>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('btnCancelar').addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      window.location.href = 'index.php?page=mnt_pianos';
    });
  });
</script>