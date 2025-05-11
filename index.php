<?php
include 'getData.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peter Alert</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="content">
            <button id="papeada">Papeada</button>
        </div>
        <div class="footer"></div>
    </div>

    <script>
        const clientData = <?php echo $clientDataJSON; ?>;
        const fakeData = <?php echo $fakeDataJSON; ?>;

        function formatField(key) {
            return fakeData[key] 
                ? `<span style="color: #ff4444; font-weight: bold">${clientData[key]} (simulado)</span>` 
                : clientData[key];
        }

        document.getElementById("papeada").addEventListener("click", function() {
            Swal.fire({
                title: "Peter Alert",
                imageUrl: "assets/peter.jpg",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Peter",
                html: `
                    <div style="text-align: left; font-family: Arial, sans-serif; font-size: 14px;">
                        <p><strong>IP:</strong> ${formatField('ip')}</p>
                        <p><strong>IP Forwarded:</strong> ${formatField('ip_forwarded')}</p>
                        <p><strong>Hostname:</strong> ${formatField('hostname')}</p>
                        <p><strong>Navegador/SO:</strong> ${formatField('user_agent')}</p>
                        <p><strong>Fecha/Hora:</strong> ${clientData.fecha_hora}</p>
                        <p><strong>Idioma:</strong> ${formatField('idioma')}</p>
                        <p><strong>Referencia:</strong> ${formatField('pagina_referer')}</p>
                    </div>
                `,
                confirmButtonText: "Depositarle 1 BTC a Andy",
                customClass: {
                    popup: 'swal-custom'
                }
            });
        });
    </script>
</body>
</html>