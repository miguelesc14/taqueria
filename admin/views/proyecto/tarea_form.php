<h1 class="text-center">Agregar tarea al proyecto:
    <?php echo $data[0]['proyecto']; ?>
</h1>

<form method="POST" action="proyecto.php?action=<?php echo $action; ?>&id=<?php echo($data[0]['id_proyecto']) ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre tarea</label>
        <input type="text" name="data[tarea]" class="form-control" placeholder="Tarea"
            value="<?php echo isset($data[0]['tarea']) ? $data[0]['tarea'] : ''; ?>" />
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Avance tarea</label>
        <input id= "por_avance" type="range" name="data[avance]" class="form-control" placeholder="Avance"
            value="<?php echo isset($data[0]['tarea']) ? $data[0]['tarea'] : ''; ?>" />
            <p>Porcentaje de avance: <output id="value"></output></p>
    </div>
    <div class="mb-3">
    <input type="hidden" name="data[id_proyecto]" value="<?php echo($data[0]['id_proyecto']) ?>">
        <?php
        if ($action == 'edit'): ?>
            <input type="hidden" name="data[id_departamento]"
                value="<?php echo isset($data[0]['id_departamento']) ? $data[0]['id_departamento'] : ''; ?>" class="" />

        <?php endif; ?>
        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />

    </div>
</form>

<script>
    const value = document.querySelector("#value")
    const input = document.querySelector("#por_avance")
    value.textContent = input.value
    input.addEventListener("input", (event) => {
        value.textContent = event.target.value
    })
</script>