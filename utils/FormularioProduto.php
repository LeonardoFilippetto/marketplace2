<?php

class FormularioProduto{	
	
	public static function monta_formulario($categoria){
        if($categoria=='placa_mae')
            return '<div class="entrar-items">
                <label for="fabricante">Fabricante:*</label>
                <input type="text" id="fabricante" name="fabricante" placeholder="ASUS" required>
                <p id="mens_fabricante" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="modelo">Modelo:*</label>
                <input type="text" id="modelo" name="modelo" placeholder="ROG STRIX Z490-A GAMING" required>
                <p id="mens_modelo" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="fab_comp">Fabricante dos processadores compatíveis:*</label>
                <select name="fab_comp" id="fab_comp" required>
                    <option value="">Selecione uma opção</option>
                    <option value="AMD">AMD</option>
                    <option value="Intel">Intel</option>
                </select>
                <p id="mens_fab_comp" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="soquete">Soquete do processador:*</label>
                <input type="text" id="soquete" name="soquete" placeholder="AM4" required >
                <p id="mens_soquete" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="frequencia">Frequência base (MHz):*</label>
                <input type="number" id="frequencia" name="frequencia" placeholder="3666" required>
                <p id="mens_frequencia" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="slots_ram">Quantidade de Barramentos RAM:*</label>
                <input type="number" id="slots_ram" name="barramentos_ram" placeholder="4" required >
                <p id="mens_slots_ram" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="max_ram">Capacidade máxima de memória RAM (GB):*</label>
                <input type="number" id="max_ram" name="max_ram" placeholder="128" required >
                <p id="mens_max_ram" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label for="tipo_ram">Geração de memória RAM:*</label>
                <select name="tipo_ram" id="tipo_ram" required>
                    <option value="">Selecione uma opção</option>
                    <option value="DDR">DDR</option>
                    <option value="DDR2">DDR2</option>
                    <option value="DDR3">DDR3</option>
                    <option value="DDR4">DDR4</option>
                    <option value="DDR5">DDR5</option>
                </select>
                <p id="mens_tipo_ram" class="mens"></p>
            </div>
    
            <div class="entrar-items">
                <label>Barramentos de vídeo presentes na placa-mãe:*</label>
                <div class="checkbox">
                <input type="checkbox" id="x1" name="x1" value="x1"> <label for="x1">PCIe X1</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="x2" name="x2" value="x2"> <label for="x2">PCIe X2</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="x4" name="x4" value="x4"> <label for="x4">PCIe X4</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="x8" name="x8" value="x8"> <label for="x8">PCIe X8</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="x16" name="x16" value="x16"> <label for="x16">PCIe X16</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="x32" name="x32" value="x32"> <label for="x32">PCIe X32</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="pci" name="pci" value="pci"> <label for="pci">PCI</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="agp" name="agp" value="agp"> <label for="agp">AGP</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="thunderbolt" name="thunderbolt" value="thunderbolt"> <label for="thunderbolt">Thunderbolt</label><br>
                </div>
                <p id="mens_barramentos" class="mens"></p>
            </div>
            <div class="entrar-items">
                <label>Armazenamento:*</label>
                <div class="checkbox">
                <input type="checkbox" id="sata" name="suporta_sata" value="1"> <label   for="sata">Suporta conectores SATA</label><br>
                </div>
                <div class="checkbox">
                <input type="checkbox" id="nvme" name="suporta_nvme" value="1"> <label   for="nvme">Suporta conectores NVMe</label><br>
                </div>
            </div>
            <div class="entrar-items">
                <label for="fator_forma">Fator de forma:*</label>
                <select name="fator_forma" id="fator_forma" required>
                    <option value="">Selecione uma opção</option>
                    <option value="atx">ATX</option>
                    <option value="eatx">EATX</option>
                    <option value="mini">Mini ATX</option>
                    <option value="micro">Micro ATX</option>
                </select>
                <p id="mens_fator_forma" class="mens"></p>
            </div>';
        
        



        if($categoria=='processador')
            return '<div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <select name="fabricante" id="fabricante" required>
                <option value="">Selecione uma opção</option>
                <option value="AMD">AMD</option>
                <option value="Intel">Intel</option>
            </select>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="linha">Linha:*</label>
            <select name="linha" id="linha" required>
                <option value="">Selecione uma opção</option>
                <option value="atom">Atom</option>
                <option value="celeron">Celeron</option>
                <option value="pentium">Pentium</option>
                <option value="i3">Core i3</option>
                <option value="i5">Core i5</option>
                <option value="i7">Core i7</option>
                <option value="i9">Core i9</option>
            </select>
            <p id="mens_linha" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="Ryzen 7 5800x" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="soquete">Soquete:*</label>
            <input type="text" id="soquete" name="soquete" placeholder="AM4" required >
            <p id="mens_soquete" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="frequencia">Frequência base (MHz):*</label>
            <input type="number" id="frequencia" name="frequencia" placeholder="3800" required>
            <p id="mens_frequencia" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="nucleos">Quantidade de núcleos:*</label>
            <input type="number" id="nucleos" name="nucleos" placeholder="8" required>
            <p id="mens_nucleos" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="threads">Quantidade de threads:*</label>
            <input type="number" id="threads" name="threads" placeholder="16" required>
            <p id="mens_threads" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="litografia">Litografia (Nanômetros):*</label>
            <input type="number" id="litografia" name="litografia" placeholder="16" required>
            <p id="mens_litografia" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label>GPU integrada:*</label>
            <div class="checkbox">
            <input type="checkbox" id="gpu" name="video_integrado" value="1"> <label for="gpu">Possui GPU integrada</label><br>
            </div>
            <p id="mens_gpu" class="mens"></p>
        </div>';




        if($categoria=='ram')
            return '*Perguntar se é kit*
        <div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="Kingston" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="Fury Beast" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="frequencia">Frequência base (MHz):*</label>
            <input type="number" id="frequencia" name="frequencia" placeholder="3666" required>
            <p id="mens_frequencia" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="quant_ram">Quantidade de memória do pente (GB):*</label>
            <input type="number" id="quant_ram" name="ram_pente_individual" placeholder="8" required>
            <p id="mens_quant_ram" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="pentes">Quantidade de pentes:*</label>
            <input type="number" id="pentes" name="quantidade_pentes" placeholder="1" required>
            <p id="mens_pentes" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="tipo_ram">Tipo de memória RAM:*</label>
            <select name="tipo_ram" id="tipo_ram" required>
                <option value="">Selecione uma opção</option>
                <option value="DDR">DDR</option>
                <option value="DDR2">DDR2</option>
                <option value="DDR3">DDR3</option>
                <option value="DDR4">DDR4</option>
                <option value="DDR5">DDR5</option>
            </select>
            <p id="mens_tipo_ram" class="mens"></p>
        </div>';




        if($categoria=='placa_video')
            return '<div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="Nvidia" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="RTX 2060 super" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="frequencia">Frequência base da GPU (MHz):*</label>
            <input type="number" id="frequencia" name="frequencia" placeholder="1470" required>
            <p id="mens_frequencia" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="quant_ram">Quantidade de memória RAM (GB):*</label>
            <input type="number" id="quant_ram" name="ram_placa_video" placeholder="8" required>
            <p id="mens_quant_ram" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="barramento">Barramento de encaixe:*</label>
            <select name="barramento_encaixe_video" id="barramento" required>
                <option value="">Selecione uma opção</option>
                <option value="x1">PCIe X1</option>
                <option value="x2">PCIe X2</option>
                <option value="x4">PCIe X4</option>
                <option value="x8">PCIe X8</option>
                <option value="x16">PCIe X16</option>
                <option value="x32">PCIe X32</option>
                <option value="pci">PCI</option>
                <option value="agp">AGP</option>
                <option value="thunderbolt">Thunderbolt</option>
            </select>
            <p id="mens_barramento" class="mens"></p>
        </div>';



        if($categoria=='armazenamento')
            return '*adaptar barramento conforme o tipo*
        <div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="Seagate" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="Barracuda Q5" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="tipo_armazenamento">Tipo de armazenamento:*</label>
            <select name="tipo_armazenamento" id="tipo_armazenamento" required>
                <option value="">Selecione uma opção</option>
                <option value="HD">HD</option>
                <option value="SSD">SSD</option>
            </select>
            <p id="mens_tipo_armazenamento" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="memoria">Quantidade de memória (GB):*</label>
            <input type="number" id="memoria" name="quantidade_armazenamento" placeholder="1000" required>
            <p id="mens_memoria" class="mens"></p>
        </div>
        <div class="entrar-items">
        <label for="barramento">Barramento de encaixe:*</label>
        <select name="barramento_encaixe_armazenamento" id="barramento" required>
            <option value="">Selecione uma opção</option>
            <option value="nvme">NVMe</option>
            <option value="sata">SATA</option>
            <option value="pata">PATA</option>
        </select>
        <p id="mens_barramento" class="mens"></p>
        </div>';




        if($categoria=='gabinete')
            return '<div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="TGT" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="Carbon" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="comprimento">Comprimento (mm):*</label>
            <input type="number" id="comprimento" name="comprimento" placeholder="330" required>
            <p id="mens_comprimento" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="largura">Largura (mm):*</label>
            <input type="number" id="largura" name="largura" placeholder="180" required>
            <p id="mens_largura" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="altura">Altura (mm):*</label>
            <input type="number" id="altura" name="altura" placeholder="410" required>
            <p id="mens_largura" class="mens"></p>
        </div>
        <div class="entrar-items">
        <label for="formato">Formato:*</label>
        <select name="formato_gabinete" id="formato" required>
            <option value="">Selecione uma opção</option>
            <option value="full">Full Tower</option>
            <option value="mid">Mid Tower</option>
            <option value="mini">Mini Tower</option>
        </select>
        <p id="mens_formato" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="fator_forma">Maior fator de forma suportado:*</label>
            <select name="fator_forma" id="fator_forma" required>
                <option value="">Selecione uma opção</option>
                <option value="eatx">EATX</option>
                <option value="atx">ATX</option>
                <option value="mini">Mini ATX</option>
                <option value="micro">Micro ATX</option>
            </select>
            <p id="mens_fator_forma" class="mens"></p>
        </div>';



        if($categoria=='fonte')
            return '<div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="Corsair" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="CV550" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="potencia">Potência (W):*</label>
            <input type="number" id="potencia" name="potencia" placeholder="550" required>
            <p id="mens_potencia" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="fator_forma">Fator de forma compatível:*</label>
            <select name="fator_forma" id="fator_forma" required>
                <option value="">Selecione uma opção</option>
                <option value="eatx">EATX</option>
                <option value="atx">ATX</option>
                <option value="mini">Mini ATX</option>
                <option value="micro">Micro ATX</option>
            </select>
            <p id="mens_fator_forma" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="certificacao">Certificação 80 Plus:*</label>
            <select name="selo_80_plus" id="certificacao" required>
                <option value="">Selecione uma opção</option>
                <option value="nenhum">Nenhum</option>
                <option value="padrao">Padrao</option>
                <option value="bronze">Bronze</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="platinum">Platinum</option>
                <option value="titanium">Titanium</option>
            </select>
            <p id="mens_certificacao" class="mens"></p>
        </div>';


        if($categoria=='cooler')
            return '<div class="entrar-items">
            <label for="fabricante">Fabricante:*</label>
            <input type="text" id="fabricante" name="fabricante" placeholder="Deepcool" required>
            <p id="mens_fabricante" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="modelo">Modelo:*</label>
            <input type="text" id="modelo" name="modelo" placeholder="Ak500" required>
            <p id="mens_modelo" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="comprimento">Comprimento (mm):*</label>
            <input type="number" id="comprimento" name="comprimento" placeholder="120" required>
            <p id="mens_comprimento" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="largura">Largura (mm):*</label>
            <input type="number" id="largura" name="largura" placeholder="120" required>
            <p id="mens_largura" class="mens"></p>
        </div>
        <div class="entrar-items">
            <label for="altura">Altura (mm):*</label>
            <input type="number" id="altura" name="altura" placeholder="120" required>
            <p id="mens_largura" class="mens"></p>
        </div>
        <div class="entrar-items">
        <label for="resfriamento">Resfriamento:*</label>
        <select name="resfriamento" id="resfriamento" required>
            <option value="">Selecione uma opção</option>
            <option value="air">Air Cooler</option>
            <option value="liquid">Liquid Cooler</option>
            <option value="fan">FAN</option>
        </select>
        <p id="mens_resfriamento" class="mens"></p>
        </div>';
    }

}
?>