<?php

namespace Fias\Dto;

/**
 * Описание полей в геттерах
 * @package Dto
 */
class AddressObject
{
    private string $ACTSTATUS;
    private string $AOGUID;
    private string $AOID;
    private string $AOLEVEL;
    private string $AREACODE;
    private string $AUTOCODE;
    private string $CENTSTATUS;
    private string $CITYCODE;
    private string $CODE;
    private string $CURRSTATUS;
    private string $ENDDATE;
    private string $FORMALNAME;
    private string $IFNSFL;
    private string $IFNSUL;
    private string $NEXTID;
    private string $OFFNAME;
    private string $OKATO;
    private string $OKTMO;
    private string $OPERSTATUS;
    private string $PARENTGUID;
    private string $PLACECODE;
    private string $PLAINCODE;
    private string $POSTALCODE;
    private string $PREVID;
    private string $REGIONCODE;
    private string $SHORTNAME;
    private string $STARTDATE;
    private string $STREETCODE;
    private string $TERRIFNSFL;
    private string $TERRIFNSUL;
    private string $UPDATEDATE;
    private string $CTARCODE;
    private string $EXTRCODE;
    private string $SEXTCODE;
    private string $LIVESTATUS;
    private string $NORMDOC;
    private string $PLANCODE;
    private string $CADNUM;
    private string $DIVTYPE;

    /**
     * Статус последней исторической записи в жизненном цикле адресного объекта
     * @return string
     */
    public function getACTSTATUS(): string
    {
        return $this->ACTSTATUS;
    }

    /**
     * @param string $ACTSTATUS
     * @return AddressObject
     */
    public function setACTSTATUS(string $ACTSTATUS): AddressObject
    {
        $this->ACTSTATUS = $ACTSTATUS;
        return $this;
    }

    /**
     * Глобальный уникальный идентификатор адресного объекта
     * @return string
     */
    public function getAOGUID(): string
    {
        return $this->AOGUID;
    }

    /**
     * @param string $AOGUID
     * @return AddressObject
     */
    public function setAOGUID(string $AOGUID): AddressObject
    {
        $this->AOGUID = $AOGUID;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getAOID(): string
    {
        return $this->AOID;
    }

    /**
     * @param string $AOID
     * @return AddressObject
     */
    public function setAOID(string $AOID): AddressObject
    {
        $this->AOID = $AOID;
        return $this;
    }

    /**
     * @return string
     */
    public function getAOLEVEL(): string
    {
        return $this->AOLEVEL;
    }

    /**
     * @param string $AOLEVEL
     * @return AddressObject
     */
    public function setAOLEVEL(string $AOLEVEL): AddressObject
    {
        $this->AOLEVEL = $AOLEVEL;
        return $this;
    }

    /**
     * @return string
     */
    public function getAREACODE(): string
    {
        return $this->AREACODE;
    }

    /**
     * @param string $AREACODE
     * @return AddressObject
     */
    public function setAREACODE(string $AREACODE): AddressObject
    {
        $this->AREACODE = $AREACODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getAUTOCODE(): string
    {
        return $this->AUTOCODE;
    }

    /**
     * @param string $AUTOCODE
     * @return AddressObject
     */
    public function setAUTOCODE(string $AUTOCODE): AddressObject
    {
        $this->AUTOCODE = $AUTOCODE;
        return $this;
    }

    /**
     * Статус центра. Неактуальное поле с января 2021 года
     * @return string
     * @deprecated
     */
    public function getCENTSTATUS(): string
    {
        return $this->CENTSTATUS;
    }

    /**
     * @param string $CENTSTATUS
     * @return AddressObject
     */
    public function setCENTSTATUS(string $CENTSTATUS): AddressObject
    {
        $this->CENTSTATUS = $CENTSTATUS;
        return $this;
    }

    /**
     * @return string
     */
    public function getCITYCODE(): string
    {
        return $this->CITYCODE;
    }

    /**
     * @param string $CITYCODE
     * @return AddressObject
     */
    public function setCITYCODE(string $CITYCODE): AddressObject
    {
        $this->CITYCODE = $CITYCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getCODE(): string
    {
        return $this->CODE;
    }

    /**
     * @param string $CODE
     * @return AddressObject
     */
    public function setCODE(string $CODE): AddressObject
    {
        $this->CODE = $CODE;
        return $this;
    }

    /**
     * Статус актуальности КЛАДР 4 (последние две цифры в коде)
     * @return string
     */
    public function getCURRSTATUS(): string
    {
        return $this->CURRSTATUS;
    }

    /**
     * @param string $CURRSTATUS
     * @return AddressObject
     */
    public function setCURRSTATUS(string $CURRSTATUS): AddressObject
    {
        $this->CURRSTATUS = $CURRSTATUS;
        return $this;
    }

    /**
     * @return string
     */
    public function getENDDATE(): string
    {
        return $this->ENDDATE;
    }

    /**
     * @param string $ENDDATE
     * @return AddressObject
     */
    public function setENDDATE(string $ENDDATE): AddressObject
    {
        $this->ENDDATE = $ENDDATE;
        return $this;
    }

    /**
     * @return string
     */
    public function getFORMALNAME(): string
    {
        return $this->FORMALNAME;
    }

    /**
     * @param string $FORMALNAME
     * @return AddressObject
     */
    public function setFORMALNAME(string $FORMALNAME): AddressObject
    {
        $this->FORMALNAME = $FORMALNAME;
        return $this;
    }

    /**
     * @return string
     */
    public function getNEXTID(): string
    {
        return $this->NEXTID;
    }

    /**
     * @param string $NEXTID
     * @return AddressObject
     */
    public function setNEXTID(string $NEXTID): AddressObject
    {
        $this->NEXTID = $NEXTID;
        return $this;
    }

    /**
     * @return string
     */
    public function getOFFNAME(): string
    {
        return $this->OFFNAME;
    }

    /**
     * @param string $OFFNAME
     * @return AddressObject
     */
    public function setOFFNAME(string $OFFNAME): AddressObject
    {
        $this->OFFNAME = $OFFNAME;
        return $this;
    }

    /**
     * @return string
     */
    public function getOKATO(): string
    {
        return $this->OKATO;
    }

    /**
     * @param string $OKATO
     * @return AddressObject
     */
    public function setOKATO(string $OKATO): AddressObject
    {
        $this->OKATO = $OKATO;
        return $this;
    }

    /**
     * @return string
     */
    public function getOKTMO(): string
    {
        return $this->OKTMO;
    }

    /**
     * @param string $OKTMO
     * @return AddressObject
     */
    public function setOKTMO(string $OKTMO): AddressObject
    {
        $this->OKTMO = $OKTMO;
        return $this;
    }

    /**
     * @return string
     */
    public function getOPERSTATUS(): string
    {
        return $this->OPERSTATUS;
    }

    /**
     * @param string $OPERSTATUS
     * @return AddressObject
     */
    public function setOPERSTATUS(string $OPERSTATUS): AddressObject
    {
        $this->OPERSTATUS = $OPERSTATUS;
        return $this;
    }

    /**
     * @return string
     */
    public function getPARENTGUID(): string
    {
        return $this->PARENTGUID;
    }

    /**
     * @param string $PARENTGUID
     * @return AddressObject
     */
    public function setPARENTGUID(string $PARENTGUID): AddressObject
    {
        $this->PARENTGUID = $PARENTGUID;
        return $this;
    }

    /**
     * @return string
     */
    public function getPLACECODE(): string
    {
        return $this->PLACECODE;
    }

    /**
     * @param string $PLACECODE
     * @return AddressObject
     */
    public function setPLACECODE(string $PLACECODE): AddressObject
    {
        $this->PLACECODE = $PLACECODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getPLAINCODE(): string
    {
        return $this->PLAINCODE;
    }

    /**
     * @param string $PLAINCODE
     * @return AddressObject
     */
    public function setPLAINCODE(string $PLAINCODE): AddressObject
    {
        $this->PLAINCODE = $PLAINCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getPOSTALCODE(): string
    {
        return $this->POSTALCODE;
    }

    /**
     * @param string $POSTALCODE
     * @return AddressObject
     */
    public function setPOSTALCODE(string $POSTALCODE): AddressObject
    {
        $this->POSTALCODE = $POSTALCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getPREVID(): string
    {
        return $this->PREVID;
    }

    /**
     * @param string $PREVID
     * @return AddressObject
     */
    public function setPREVID(string $PREVID): AddressObject
    {
        $this->PREVID = $PREVID;
        return $this;
    }

    /**
     * @return string
     */
    public function getREGIONCODE(): string
    {
        return $this->REGIONCODE;
    }

    /**
     * @param string $REGIONCODE
     * @return AddressObject
     */
    public function setREGIONCODE(string $REGIONCODE): AddressObject
    {
        $this->REGIONCODE = $REGIONCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getSHORTNAME(): string
    {
        return $this->SHORTNAME;
    }

    /**
     * @param string $SHORTNAME
     * @return AddressObject
     */
    public function setSHORTNAME(string $SHORTNAME): AddressObject
    {
        $this->SHORTNAME = $SHORTNAME;
        return $this;
    }

    /**
     * @return string
     */
    public function getSTARTDATE(): string
    {
        return $this->STARTDATE;
    }

    /**
     * @param string $STARTDATE
     * @return AddressObject
     */
    public function setSTARTDATE(string $STARTDATE): AddressObject
    {
        $this->STARTDATE = $STARTDATE;
        return $this;
    }

    /**
     * @return string
     */
    public function getSTREETCODE(): string
    {
        return $this->STREETCODE;
    }

    /**
     * @param string $STREETCODE
     * @return AddressObject
     */
    public function setSTREETCODE(string $STREETCODE): AddressObject
    {
        $this->STREETCODE = $STREETCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getTERRIFNSFL(): string
    {
        return $this->TERRIFNSFL;
    }

    /**
     * @param string $TERRIFNSFL
     * @return AddressObject
     */
    public function setTERRIFNSFL(string $TERRIFNSFL): AddressObject
    {
        $this->TERRIFNSFL = $TERRIFNSFL;
        return $this;
    }

    /**
     * @return string
     */
    public function getUPDATEDATE(): string
    {
        return $this->UPDATEDATE;
    }

    /**
     * @param string $UPDATEDATE
     * @return AddressObject
     */
    public function setUPDATEDATE(string $UPDATEDATE): AddressObject
    {
        $this->UPDATEDATE = $UPDATEDATE;
        return $this;
    }

    /**
     * @return string
     */
    public function getCTARCODE(): string
    {
        return $this->CTARCODE;
    }

    /**
     * @param string $CTARCODE
     * @return AddressObject
     */
    public function setCTARCODE(string $CTARCODE): AddressObject
    {
        $this->CTARCODE = $CTARCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getEXTRCODE(): string
    {
        return $this->EXTRCODE;
    }

    /**
     * @param string $EXTRCODE
     * @return AddressObject
     */
    public function setEXTRCODE(string $EXTRCODE): AddressObject
    {
        $this->EXTRCODE = $EXTRCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getSEXTCODE(): string
    {
        return $this->SEXTCODE;
    }

    /**
     * @param string $SEXTCODE
     * @return AddressObject
     */
    public function setSEXTCODE(string $SEXTCODE): AddressObject
    {
        $this->SEXTCODE = $SEXTCODE;
        return $this;
    }

    /**
     * Статус актуальности адресного объекта ФИАС на текущую дату
     * @return int
     */
    public function getLIVESTATUS(): int
    {
        return $this->LIVESTATUS;
    }

    /**
     * @param int $LIVESTATUS
     * @return AddressObject
     */
    public function setLIVESTATUS(int $LIVESTATUS): AddressObject
    {
        $this->LIVESTATUS = $LIVESTATUS;
        return $this;
    }

    /**
     * @return string
     */
    public function getNORMDOC(): string
    {
        return $this->NORMDOC;
    }

    /**
     * @param string $NORMDOC
     * @return AddressObject
     */
    public function setNORMDOC(string $NORMDOC): AddressObject
    {
        $this->NORMDOC = $NORMDOC;
        return $this;
    }

    /**
     * @return string
     */
    public function getPLANCODE(): string
    {
        return $this->PLANCODE;
    }

    /**
     * @param string $PLANCODE
     * @return AddressObject
     */
    public function setPLANCODE(string $PLANCODE): AddressObject
    {
        $this->PLANCODE = $PLANCODE;
        return $this;
    }

    /**
     * @return string
     */
    public function getCADNUM(): string
    {
        return $this->CADNUM;
    }

    /**
     * @param string $CADNUM
     * @return AddressObject
     */
    public function setCADNUM(string $CADNUM): AddressObject
    {
        $this->CADNUM = $CADNUM;
        return $this;
    }

    /**
     * @return string
     */
    public function getDIVTYPE(): string
    {
        return $this->DIVTYPE;
    }

    /**
     * @param string $DIVTYPE
     * @return AddressObject
     */
    public function setDIVTYPE(string $DIVTYPE): AddressObject
    {
        $this->DIVTYPE = $DIVTYPE;
        return $this;
    }

    /**
     * @return string
     */
    public function getIFNSFL(): string
    {
        return $this->IFNSFL;
    }

    /**
     * @param string $IFNSFL
     * @return AddressObject
     */
    public function setIFNSFL(string $IFNSFL): AddressObject
    {
        $this->IFNSFL = $IFNSFL;
        return $this;
    }

    /**
     * @return string
     */
    public function getIFNSUL(): string
    {
        return $this->IFNSUL;
    }

    /**
     * @param string $IFNSUL
     * @return AddressObject
     */
    public function setIFNSUL(string $IFNSUL): AddressObject
    {
        $this->IFNSUL = $IFNSUL;
        return $this;
    }

    /**
     * @return string
     */
    public function getTERRIFNSUL(): string
    {
        return $this->TERRIFNSUL;
    }

    /**
     * @param string $TERRIFNSUL
     * @return AddressObject
     */
    public function setTERRIFNSUL(string $TERRIFNSUL): AddressObject
    {
        $this->TERRIFNSUL = $TERRIFNSUL;
        return $this;
    }
}