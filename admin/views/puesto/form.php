<h1><?php echo ($action == 'edit')?'Modificar':'Nuevo' ;?> puesto</h1>
<form method="POST" action="puesto.php?action=<?php echo $action; ?>">
<div class="mb-3" id="nombre">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" name="data[nombre]" class="form-control" placeholder="primer nombre"
            value="<?php echo isset($data[0]['primer_nombre']) ? $data[0]['primer_nombre'] : ''; ?>"  required/>
    </div>
    <div class="mb-3" id="segundo_nombre">
        <label for="exampleFormControlInput1" class="form-label">Segundo nombre</label>
        <input type="text" name="data[segundo_nombre]" class="form-control" placeholder="segundo nombre"
            value="<?php echo isset($data[0]['segundo_nombre']) ? $data[0]['segundo_nombre'] : ''; ?>" />
    </div>
    <div class="mb-3" id="apellido">
        <label for="exampleFormControlInput1" class="form-label">Primer apellido</label>
        <input type="text" name="data[primer_apellido]" class="form-control" placeholder="primer apellido"
            value="<?php echo isset($data[0]['primer_apellido']) ? $data[0]['primer_apellido'] : ''; ?>" />
    </div>
    <div class="mb-3" id="segundo_apellido">
        <label for="exampleFormControlInput1" class="form-label">Segundo apellido</label>
        <input type="text" name="data[segundo_apellido]" class="form-control" placeholder="segundo apellido"
            value="<?php echo isset($data[0]['segundo_apellido']) ? $data[0]['segundo_apellido'] : ''; ?>" />
    </div>
    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
        <input type="date" id="curp_input" name="data[nacimiento]" class="form-control" placeholder="Fecha de nacimiento"
            value="<?php echo isset($data[0]['nacimiento']) ? $data[0]['nacimiento'] : ''; ?>" required/>
    </div>
    <div class="mb-3" id="curp">
<label for="exampleFormControlInput1" class="form-label">CURP</label>
        <input type="text" id="curp_input" name="data[CURP]" class="form-control" placeholder="CURP"
            value="<?php echo isset($data[0]['curp']) ? $data[0]['curp'] : ''; ?>" required/>
    </div>
    <div class="mb-3" id="rfc">
        <label for="exampleFormControlInput1" class="form-label">RFC</label>
        <input type="text" name="data[RFC]" class="form-control" placeholder="rfc"
            value="<?php echo isset($data[0]['rfc']) ? $data[0]['rfc'] : ''; ?>" required />
    </div>
    <div class="row">
    <label for="exampleFormControlInput1" class="form-label">Departamento</label>
        <div class="col-2">
            <select name="data[id_departamento]" required="required">
                <?php
                $selected = " ";
                foreach ($dataDepartamentos as $key => $depto):
                    if ($depto['id_departamento'] == $data[0]['id_departamento']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $depto['id_departamento']; ?>" <?php echo $selected; ?>>
                        <?php echo $depto['departamento'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <?
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_puesto]"
                value="<?php echo isset($data[0]['id_puesto']) ? $data[0]['id_puesto'] : ''; ?>" class="" />

        <? endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="" />

    </div>
</form>
<div class="col">
            <a class="btn btn-lg btn-primary" href="indexadmin.php">Regresar</a>
</div>