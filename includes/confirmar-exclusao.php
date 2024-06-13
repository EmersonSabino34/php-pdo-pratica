<main>
    <h2 class="mt-3">Excluir</h2>

    <form method="post">
        <div class="form-group">
            <p> Você confirma a exclusão <strong><?=$obVaga->titulo?></strong>?</p>            
        </div>
            <div class="form-group mt-3">
                <a href="index.php">
                    <button class="btn btn-success" type="button">  Cancelar   </button>
                </a>    
                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
            </div>
        </div>
        
    </form>
</main>