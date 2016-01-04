-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_bpma
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_bpma
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_bpma` DEFAULT CHARACTER SET latin1 ;
USE `bd_bpma` ;

-- -----------------------------------------------------
-- Table `bd_bpma`.`policial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`policial` (
  `pol_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_NomeCompleto` VARCHAR(120) NULL DEFAULT NULL COMMENT '',
  `pol_CPF` VARCHAR(15) NOT NULL COMMENT '',
  `pol_RG` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `pol_OrgaoExpedidor` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_Naturalidade` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_NaturalidadeUF` VARCHAR(2) NULL DEFAULT NULL COMMENT '',
  `pol_DataNascimento` DATE NULL DEFAULT NULL COMMENT '',
  `pol_NomePai` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_NomeMae` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_Sexo` CHAR(1) NULL DEFAULT NULL COMMENT '',
  `pol_CNH` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_CNHCategoria` VARCHAR(3) NULL DEFAULT NULL COMMENT '',
  `pol_CNHValidade` DATE NULL DEFAULT NULL COMMENT '',
  `pol_EstadoCivil` TINYINT(4) NULL DEFAULT NULL COMMENT '1 - Solteiro\n2 - Casado\n3 - Separado\n4 - Divorciado\n5 - Viúvo',
  `pol_TelefoneFixo` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_TelefoneCelular` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_Email` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_Matricula` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `pol_MatriculaSIAPE` VARCHAR(14) NULL DEFAULT NULL COMMENT '',
  `pol_DataAdmissao` DATE NULL DEFAULT NULL COMMENT '',
  `pol_Quadro` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `pol_NomeGuerra` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_TipoSangue` VARCHAR(3) NULL DEFAULT NULL COMMENT '',
  `pol_PostoGraduacao` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_DoadorSangue` CHAR(1) NULL DEFAULT NULL COMMENT '',
  `pol_FuncionalTipo` CHAR(1) NULL DEFAULT NULL COMMENT '',
  `pol_IdentidadeFuncionalValidade` DATE NULL DEFAULT NULL COMMENT '',
  `pol_PorteArmaSituacao` TINYINT(4) NULL DEFAULT NULL COMMENT '',
  `pol_Comportamento` VARCHAR(1) NULL DEFAULT NULL COMMENT '',
  `pol_PISPASEP` VARCHAR(12) NULL DEFAULT NULL COMMENT '',
  `pol_SubUnidade` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_ServicoPosto` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_ServicoHorario` VARCHAR(12) NULL DEFAULT NULL COMMENT '',
  `pol_ServicoEscala` CHAR(1) NULL DEFAULT NULL COMMENT '',
  `pol_Lotacao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_ServicoFuncao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_BienalValidade` DATE NULL DEFAULT NULL COMMENT '',
  `pol_TAFValidade` DATE NULL DEFAULT NULL COMMENT '',
  `pol_Antiguidade` INT NULL DEFAULT NULL COMMENT '',
  `pol_Foto` BLOB NULL DEFAULT NULL COMMENT '',
  `pol_FotoTipo` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoUF` CHAR(2) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoCidade` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoBairro` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoQuadra` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoConjunto` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoNumero` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoCEP` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoComplemento` VARCHAR(60) NULL DEFAULT NULL COMMENT '',
  `pol_EnderecoTipo` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `pol_TituloEleitor` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_TituloZona` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_TituloSecao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_TituloMunicipio` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_TituloMunicipioUF` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `pol_AtualizacaoCadastro` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`pol_Codigo`)  COMMENT '',
  UNIQUE INDEX `pol_CPF_UNIQUE` (`pol_CPF` ASC)  COMMENT '',
  UNIQUE INDEX `pol_Matricula_UNIQUE` (`pol_Matricula` ASC)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 500
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`afastamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`afastamento` (
  `afa_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `afa_Tipo` TINYINT(4) NULL DEFAULT NULL COMMENT '',
  `afa_Referencia` VARCHAR(4) NULL DEFAULT NULL COMMENT '',
  `afa_DataInicio` DATE NULL DEFAULT NULL COMMENT '',
  `afa_DataFim` DATE NULL DEFAULT NULL COMMENT '',
  `afa_Observacao` VARCHAR(240) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`afa_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_afastamento_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_afastamento_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`arma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`arma` (
  `arm_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `arm_Tombamento` VARCHAR(45) NOT NULL COMMENT '',
  `arm_Especie` VARCHAR(45) NOT NULL COMMENT '',
  `arm_Marca` VARCHAR(45) NOT NULL COMMENT '',
  `arm_Modelo` VARCHAR(45) NOT NULL COMMENT '',
  `arm_NumeroSerie` VARCHAR(45) NOT NULL COMMENT '',
  `arm_Calibre` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`arm_Codigo`)  COMMENT '',
  UNIQUE INDEX `arm_Codigo_UNIQUE` (`arm_Codigo` ASC)  COMMENT '',
  UNIQUE INDEX `arm_Tombamento_UNIQUE` (`arm_Tombamento` ASC)  COMMENT '',
  UNIQUE INDEX `arm_NumeroSerie_UNIQUE` (`arm_NumeroSerie` ASC)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_bpma`.`cautela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`cautela` (
  `cau_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `cau_Material` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cau_Data` DATE NULL DEFAULT NULL COMMENT '',
  `cau_Descricao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cau_NumeroSerie` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cau_Tombamento` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`cau_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_cautela_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_cautela_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`ctgrafi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`ctgrafi` (
  `ctg_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `ctg_Numero` VARCHAR(45) NOT NULL COMMENT '',
  `ctg_Boletim` VARCHAR(45) NOT NULL COMMENT '',
  `ctg_Data` DATETIME NOT NULL COMMENT '',
  `arm_Codigo` INT(11) NOT NULL COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`ctg_Codigo`)  COMMENT '',
  UNIQUE INDEX `ctg_Codigo_UNIQUE` (`ctg_Codigo` ASC)  COMMENT '',
  INDEX `fk_ctgrafi_arma1_idx` (`arm_Codigo` ASC)  COMMENT '',
  INDEX `fk_ctgrafi_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_ctgrafi_arma1`
    FOREIGN KEY (`arm_Codigo`)
    REFERENCES `bd_bpma`.`arma` (`arm_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ctgrafi_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_bpma`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`curso` (
  `cur_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `cur_Nome` VARCHAR(150) NOT NULL COMMENT '',
  `cur_Unidade` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `cur_CargaHoraria` VARCHAR(45) NOT NULL COMMENT '',
  `cur_DataConclusao` DATE NOT NULL COMMENT '',
  `cur_Tipo` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`cur_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_curso_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_curso_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`dispensamedica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`dispensamedica` (
  `dis_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `dis_InicioData` DATE NOT NULL COMMENT '',
  `dis_FimData` DATE NOT NULL COMMENT '',
  `dis_Motivo` VARCHAR(250) NOT NULL COMMENT '',
  `dis_CID` VARCHAR(15) NOT NULL COMMENT '',
  PRIMARY KEY (`dis_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_dispensaMedica_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_dispensaMedica_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`ferias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`ferias` (
  `fer_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `fer_Opcao1` VARCHAR(45) NULL COMMENT '',
  `fer_Opcao2` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `fer_Opcao3` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `fer_AnoReferencia` VARCHAR(4) NULL DEFAULT NULL COMMENT '',
  `fer_Programacao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `fer_Inicio` DATETIME NULL COMMENT '',
  `fer_Parcela` INT NULL COMMENT '',
  `fer_NaoGozo` VARCHAR(25) NULL COMMENT '',
  `fer_Boletim` VARCHAR(45) NULL COMMENT '',
  `fer_QtdDias` INT NULL COMMENT '',
  PRIMARY KEY (`fer_Codigo`)  COMMENT '',
  INDEX `fk_ferias_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_ferias_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 320
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`formacao` (
  `for_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `for_Tipo` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `for_Nome` VARCHAR(150) NOT NULL COMMENT '',
  `for_Conclusao` DATE NULL DEFAULT NULL COMMENT '',
  `for_Instituicao` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `for_AreaConhecimento` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`for_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_formacao_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_formacao_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`restricaomedica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`restricaomedica` (
  `res_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `res_InicioData` DATE NOT NULL COMMENT '',
  `res_FinalData` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`res_Codigo`, `pol_Codigo`)  COMMENT '',
  INDEX `fk_restricaoMedica_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_restricaoMedica_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`restricaotipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`restricaotipo` (
  `ret_Codigo` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `ret_Tipo` VARCHAR(45) NOT NULL COMMENT '',
  `ret_Descricao` VARCHAR(80) NOT NULL COMMENT '',
  PRIMARY KEY (`ret_Codigo`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`restricaomedica_restricaotipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`restricaomedica_restricaotipo` (
  `res_Codigo` INT(11) NOT NULL COMMENT '',
  `ret_Codigo` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`res_Codigo`, `ret_Codigo`)  COMMENT '',
  INDEX `fk_restricaomedica_has_restricaotipo_restricaotipo1_idx` (`ret_Codigo` ASC)  COMMENT '',
  INDEX `fk_restricaomedica_has_restricaotipo_restricaomedica1_idx` (`res_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_restricaomedica_restricaotipo_restricaomedica1`
    FOREIGN KEY (`res_Codigo`)
    REFERENCES `bd_bpma`.`restricaomedica` (`res_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_restricaomedica_restricaotipo_restricaotipo1`
    FOREIGN KEY (`ret_Codigo`)
    REFERENCES `bd_bpma`.`restricaotipo` (`ret_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bd_bpma`.`alteracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`alteracao` (
  `alt_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `alt_Tipo` VARCHAR(45) NOT NULL COMMENT '',
  `alt_QuantidadeDias` VARCHAR(45) NULL COMMENT '',
  `alt_Apuracao` VARCHAR(45) NULL COMMENT '',
  `alt_DataApuracao` DATETIME NULL COMMENT '',
  `alt_Origem` VARCHAR(45) NULL COMMENT '',
  `alt_DataFato` DATETIME NULL COMMENT '',
  `alt_Boletim` VARCHAR(45) NULL COMMENT '',
  `alt_Data` DATETIME NULL COMMENT '',
  `alt_Descricao` TEXT NULL COMMENT '',
  `alt_FaltaServico` CHAR(1) NULL COMMENT '',
  PRIMARY KEY (`alt_Codigo`)  COMMENT '',
  UNIQUE INDEX `alt_codigo_UNIQUE` (`alt_Codigo` ASC)  COMMENT '',
  INDEX `fk_alteracao_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_alteracao_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`numeracao_requerimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`numeracao_requerimento` (
  `nre_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nre_numero` BIGINT NOT NULL COMMENT '',
  `nre_ano` VARCHAR(4) NOT NULL COMMENT '',
  `nre_descricao` VARCHAR(125) NOT NULL COMMENT '',
  PRIMARY KEY (`nre_Codigo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`requerimento_abono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`requerimento_abono` (
  `rab_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `nre_Codigo` INT NOT NULL COMMENT '',
  `rab_Numero` VARCHAR(45) NULL COMMENT '',
  `rab_NomePolicial` VARCHAR(150) NULL COMMENT '',
  `rab_PostoGraduacao` VARCHAR(25) NULL COMMENT '',
  `rab_Matricula` VARCHAR(25) NULL COMMENT '',
  `rab_MatriculaSiape` VARCHAR(25) NULL COMMENT '',
  `rab_IdentificacaoUnica` VARCHAR(25) NULL COMMENT '',
  `rab_QuantidadeDias` INT NOT NULL COMMENT '',
  `rab_InicioAbono` DATETIME NOT NULL COMMENT '',
  `rab_FimAbono` DATETIME NOT NULL COMMENT '',
  `rab_DataSolicitacao` DATETIME NOT NULL COMMENT '',
  `rab_DataInclusao` DATETIME NULL COMMENT '',
  `rab_Email` VARCHAR(100) NULL COMMENT '',
  `rab_Comportamento` VARCHAR(25) NULL COMMENT '',
  `rab_Telefone` VARCHAR(45) NULL COMMENT '',
  `rab_FaltaInjustificada` VARCHAR(250) NULL COMMENT '',
  `rab_GozosAnteriores` VARCHAR(250) NULL COMMENT '',
  `rab_Sargenteante` VARCHAR(150) NULL COMMENT '',
  `rab_FuncaoSargenteante` VARCHAR(45) NULL COMMENT '',
  `rab_ChefeNGP` VARCHAR(150) NULL COMMENT '',
  `rab_FuncaoChefeNGP` VARCHAR(45) NULL COMMENT '',
  `rab_ChefeSad` VARCHAR(150) NULL COMMENT '',
  `rab_FuncaoChefeSad` VARCHAR(45) NULL COMMENT '',
  `rab_Lotacao` VARCHAR(80) NULL COMMENT '',
  `rab_ChefeImediato` VARCHAR(150) NULL COMMENT '',
  `rab_FuncaoChefe` VARCHAR(45) NULL COMMENT '',
  `rab_Comandante` VARCHAR(150) NULL COMMENT '',
  `rab_FuncaoComandante` VARCHAR(45) NULL COMMENT '',
  `rab_Decisao` VARCHAR(30) NULL COMMENT '',
  `rab_DataDecisao` DATETIME NULL COMMENT '',
  `rab_Template` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`rab_Codigo`)  COMMENT '',
  INDEX `fk_requerimento_abono_numeracao_requerimento1_idx` (`nre_Codigo` ASC)  COMMENT '',
  INDEX `fk_requerimento_abono_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_requerimento_abono_numeracao_requerimento1`
    FOREIGN KEY (`nre_Codigo`)
    REFERENCES `bd_bpma`.`numeracao_requerimento` (`nre_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requerimento_abono_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`requerimento_ferias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`requerimento_ferias` (
  `rfe_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `nre_Codigo` INT NOT NULL COMMENT '',
  `rfe_Numero` VARCHAR(45) NULL COMMENT '',
  `rfe_Tipo` VARCHAR(45) NULL COMMENT '',
  `rfe_NomePolicial` VARCHAR(150) NULL COMMENT '',
  `rfe_PostoGraduacao` VARCHAR(25) NULL COMMENT '',
  `rfe_Matricula` VARCHAR(25) NULL COMMENT '',
  `rfe_MatriculaSiape` VARCHAR(25) NULL COMMENT '',
  `rfe_IdentificacaoUnica` VARCHAR(25) NULL COMMENT '',
  `rfe_AnoReferencia` VARCHAR(4) NULL COMMENT '',
  `rfe_FeriasProgramacao` VARCHAR(45) NULL COMMENT '',
  `rfe_NovaProgramacao` VARCHAR(45) NULL COMMENT '',
  `rfe_DataSolicitacao` DATETIME NULL COMMENT '',
  `rfe_DataInclusao` DATETIME NULL COMMENT '',
  `rfe_Email` VARCHAR(150) NULL COMMENT '',
  `rfe_Comportamento` VARCHAR(45) NULL COMMENT '',
  `rfe_Telefone` VARCHAR(45) NULL COMMENT '',
  `rfe_PolFeriasBatalhao` INT NULL COMMENT '',
  `rfe_UmDozeBatalhao` INT NULL COMMENT '',
  `rfe_PolFeriasSubUnidade` INT NULL COMMENT '',
  `rfe_UmDozeSubUnidade` INT NULL COMMENT '',
  `rfe_Sargenteante` VARCHAR(150) NULL COMMENT '',
  `rfe_FuncaoSargenteante` VARCHAR(45) NULL COMMENT '',
  `rfe_ChefeNGP` VARCHAR(150) NULL COMMENT '',
  `rfe_FuncaoChefeNGP` VARCHAR(45) NULL COMMENT '',
  `rfe_ChefeSAd` VARCHAR(150) NULL COMMENT '',
  `rfe_FuncaoChefeSAd` VARCHAR(45) NULL COMMENT '',
  `rfe_Lotacao` VARCHAR(60) NULL COMMENT '',
  `rfe_ChefeImediato` VARCHAR(150) NULL COMMENT '',
  `rfe_FuncaoChefe` VARCHAR(45) NULL COMMENT '',
  `rfe_Comandante` VARCHAR(150) NULL COMMENT '',
  `rfe_FuncaoComandante` VARCHAR(45) NULL COMMENT '',
  `rfe_Decisao` VARCHAR(45) NULL COMMENT '',
  `rfe_DataDecisao` DATETIME NULL COMMENT '',
  `rfe_PrimeiraParcelaInicio` DATETIME NULL COMMENT '',
  `rfe_PrimeiraParcelaQtdDias` INT NULL COMMENT '',
  `rfe_SegundaParcelaInicio` DATETIME NULL COMMENT '',
  `rfe_SegundaParcelaQtdDias` INT NULL COMMENT '',
  `rfe_TerceiraParcelaInicio` DATETIME NULL COMMENT '',
  `rfe_TerceiraParcelaQtdDias` INT NULL COMMENT '',
  `rfe_Template` VARCHAR(45) NULL COMMENT '',
  `rfe_NaoGozo` VARCHAR(45) NULL COMMENT '',
  `rfe_MomentoOportuno` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`rfe_Codigo`)  COMMENT '',
  INDEX `fk_requerimento_ferias_numeracao_requerimento1_idx` (`nre_Codigo` ASC)  COMMENT '',
  INDEX `fk_requerimento_ferias_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_requerimento_ferias_numeracao_requerimento1`
    FOREIGN KEY (`nre_Codigo`)
    REFERENCES `bd_bpma`.`numeracao_requerimento` (`nre_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_requerimento_ferias_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`protocolo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`protocolo` (
  `pro_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pro_Numero` INT NOT NULL COMMENT '',
  `pro_Ano` VARCHAR(4) NOT NULL COMMENT '',
  `pro_Descricao` VARCHAR(155) NOT NULL COMMENT '',
  PRIMARY KEY (`pro_Codigo`)  COMMENT '',
  UNIQUE INDEX `pro_Numero_UNIQUE` (`pro_Numero` ASC)  COMMENT '',
  UNIQUE INDEX `pro_Codigo_UNIQUE` (`pro_Codigo` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`documento` (
  `doc_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pro_Codigo` INT NOT NULL COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `doc_Tipo` VARCHAR(100) NOT NULL COMMENT '',
  `doc_Numero` VARCHAR(45) NOT NULL COMMENT '',
  `doc_Data` DATETIME NOT NULL COMMENT '',
  `doc_Assunto` VARCHAR(250) NULL COMMENT '',
  `doc_Recebimento` DATETIME NOT NULL COMMENT '',
  `doc_Origem` VARCHAR(120) NULL COMMENT '',
  PRIMARY KEY (`doc_Codigo`)  COMMENT '',
  INDEX `fk_documento_protocolo1_idx` (`pro_Codigo` ASC)  COMMENT '',
  INDEX `fk_documento_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_documento_protocolo1`
    FOREIGN KEY (`pro_Codigo`)
    REFERENCES `bd_bpma`.`protocolo` (`pro_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_documento_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`encaminhamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`encaminhamento` (
  `enc_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `doc_Codigo` INT NOT NULL COMMENT '',
  `enc_Encaminhamento` INT NULL COMMENT '',
  `enc_Secao` VARCHAR(120) NOT NULL COMMENT '',
  `enc_Data` DATETIME NOT NULL COMMENT '',
  `enc_Status` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`enc_Codigo`)  COMMENT '',
  INDEX `fk_encaminhamento_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  INDEX `fk_encaminhamento_documento1_idx` (`doc_Codigo` ASC)  COMMENT '',
  INDEX `fk_encaminhamento_encaminhamento1_idx` (`enc_Encaminhamento` ASC)  COMMENT '',
  CONSTRAINT `fk_encaminhamento_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encaminhamento_documento1`
    FOREIGN KEY (`doc_Codigo`)
    REFERENCES `bd_bpma`.`documento` (`doc_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encaminhamento_encaminhamento1`
    FOREIGN KEY (`enc_Encaminhamento`)
    REFERENCES `bd_bpma`.`encaminhamento` (`enc_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`perfil` (
  `per_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `per_nome` VARCHAR(45) NOT NULL COMMENT '',
  `per_PerfilCodigo` INT NULL COMMENT '',
  PRIMARY KEY (`per_Codigo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`usuario` (
  `usu_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `pol_Codigo` INT(11) NOT NULL COMMENT '',
  `per_Codigo` INT NOT NULL COMMENT '',
  `usu_login` VARCHAR(100) NOT NULL COMMENT '',
  `usu_senha` VARCHAR(255) NOT NULL COMMENT '',
  `usu_status` VARCHAR(45) NOT NULL COMMENT '',
  `usu_token` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`usu_Codigo`)  COMMENT '',
  INDEX `fk_usuario_policial1_idx` (`pol_Codigo` ASC)  COMMENT '',
  INDEX `fk_usuario_perfil1_idx` (`per_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_usuario_policial1`
    FOREIGN KEY (`pol_Codigo`)
    REFERENCES `bd_bpma`.`policial` (`pol_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_perfil1`
    FOREIGN KEY (`per_Codigo`)
    REFERENCES `bd_bpma`.`perfil` (`per_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`recurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`recurso` (
  `rec_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `rec_Nome` VARCHAR(250) NOT NULL COMMENT '',
  PRIMARY KEY (`rec_Codigo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_bpma`.`acl`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_bpma`.`acl` (
  `acl_Codigo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `per_Codigo` INT NOT NULL COMMENT '',
  `rec_Codigo` INT NOT NULL COMMENT '',
  `acl_permissao` VARCHAR(10) NOT NULL COMMENT '',
  `res_Codigo` INT NOT NULL COMMENT '',
  PRIMARY KEY (`acl_Codigo`)  COMMENT '',
  INDEX `fk_acl_perfil1_idx` (`per_Codigo` ASC)  COMMENT '',
  INDEX `fk_acl_recurso1_idx` (`rec_Codigo` ASC)  COMMENT '',
  CONSTRAINT `fk_acl_perfil1`
    FOREIGN KEY (`per_Codigo`)
    REFERENCES `bd_bpma`.`perfil` (`per_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acl_recurso1`
    FOREIGN KEY (`rec_Codigo`)
    REFERENCES `bd_bpma`.`recurso` (`rec_Codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
