<?php
    require_once 'conexao.php';
    
      if(isset($_GET['remover_prop'])){
        $id = $_GET['remover_prop'];
?>
        <div class="modal-header"> 
            <div>
                <h5 class="modal-title text-center" id="largeModalLabel">Remover Cliente</h5>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post">
            <div class="modal-body">
                <div class="font-family form-group text-center">
                   Deseja realmente remover esse Cliente?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" name="prop_removido" value="<?php echo $id?>">Sim</button>
            </div>
        </form>
<?php  

    }
