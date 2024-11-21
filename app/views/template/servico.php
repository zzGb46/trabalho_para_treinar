<!-- Start Services -->
<div class="d-flex justify-content-center">
    <div class="sticky-content container">
        <div class="content style_2">
            <div class="service">

                <?php foreach ($servicos as $servico): ?>

                    <div class="service-card" data-aos="fade-left">
                        <a href="services-single.html" class="card-img">
                            
                        <img src="<?php 
                        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "kioficina/public/uploads/" . $servico['foto_galeria'];
                            if($servico['foto_galeria'] !=""){
                                    if(file_exists("http://localhost/kioficina/public/uploads/" .$servico['foto_galeria'])){echo htmlspecialchars($servico['foto_servico'], ENT_QUOTES, 'UTF-8');             
                                    }else{
                                        echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                                    }

                            }else{
                                echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                            }
                            ?>" class="ak-bg" alt="...">

                        </a>
                        <div class="card-info">
                            <a href="services-single.html" class="card-title"><?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <p class="card-desp"><?php echo htmlspecialchars($servico['descricao_servico'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a href="services-single.html" class="more-btn">VIEW MORE</a>
                        </div>
                    </div>

                <?php endforeach ?>


            </div>
        </div>
        <div class="sidebar width-none">
            <div class="services-content">
                <div class="ak-section-heading ak-style-1">
                    <div class="background-text" data-aos="fade-right" data-aos-duration="1000">Services</div>
                    <h2 class="ak-section-title">Dedicated<br> Services</h2>
                    <p class="ak-section-subtitle">Lorem Ipsum is simply dummy text of the printing and
                        typesetting
                        industry. Lorem Ipsum has been the industry's stan. Lorem Ipsum is simply dummy text of
                        the
                        printing and typesetting industry. Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
</div>


