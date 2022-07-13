
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $("#home").click(function() {
            $('#calendario_div').addClass('d-none');
            $('#pilotos_div').addClass('d-none');
            $('#equipes_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');
            $('#contato_div').addClass('d-none');

            $('#home_div').removeClass('d-none');
        });
        
        $("#calendario").click(function() {
            $('#home_div').addClass('d-none');
            $('#pilotos_div').addClass('d-none');
            $('#equipes_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');
            $('#contato_div').addClass('d-none');

            $('#calendario_div').removeClass('d-none');
        });

        $("#pilotos").click(function() {
            $('#home_div').addClass('d-none');
            $('#calendario_div').addClass('d-none');
            $('#equipes_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');
            $('#contato_div').addClass('d-none');

            $('#pilotos_div').removeClass('d-none');
        });

        $("#equipes").click(function() {
            $('#home_div').addClass('d-none');
            $('#calendario_div').addClass('d-none');
            $('#pilotos_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');
            $('#contato_div').addClass('d-none');

            $('#equipes_div').removeClass('d-none');
        });

        $("#classificacao").click(function() {
            $('#home_div').addClass('d-none');
            $('#calendario_div').addClass('d-none');
            $('#pilotos_div').addClass('d-none');
            $('#equipes_div').addClass('d-none');
            $('#contato_div').addClass('d-none');

            $('#classificacao_div').removeClass('d-none');
        });

        $("#contato").click(function() {
            $('#home_div').addClass('d-none');
            $('#calendario_div').addClass('d-none');
            $('#pilotos_div').addClass('d-none');
            $('#equipes_div').addClass('d-none');
            $('#classificacao_div').addClass('d-none');

            $('#contato_div').removeClass('d-none');
        });
  
    </script>
</body>

</html>