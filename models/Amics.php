<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amics".
 *
 * @property integer $numero
 * @property string $cognoms
 * @property string $nom
 * @property string $adresa
 * @property string $cp
 * @property string $poblacio
 * @property string $comarca
 * @property integer $telefon
 * @property integer $telefon_mobil
 * @property string $mail
 * @property string $nif
 * @property string $data_naix
 * @property string $data_proc
 */
class Amics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $tipus;

    public static function tableName()
    {
        return 'amics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefon', 'telefon_mobil'], 'integer'],
            [['data_naix', 'data_proc'], 'safe'],
            [['cognoms', 'adresa', 'poblacio', 'comarca', 'mail'], 'string', 'max' => 100],
            [['nom'], 'string', 'max' => 1100],
            [['cp'], 'string', 'max' => 10],
            [['nif'], 'string', 'max' => 15],
            [['tipus'],'safe'],
            [['registre',],'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numero' => 'Número',
            'cognoms' => 'Cognoms',
            'nom' => 'Nom',
            'adresa' => 'Adreça',
            'cp' => 'Codi Postal',
            'poblacio' => 'Població',
            'comarca' => 'Comarca',
            'telefon' => 'Telèfon',
            'telefon_mobil' => 'Telèfon Mòbil',
            'mail' => 'E-mail',
            'nif' => 'NIF',
            'data_naix' => 'Data Naixement',
            'data_proc' => 'Data Procedència',
            'tipus' => 'Típus de via',
            'registre' => 'Procedència Registre'
        ];
    }
}
