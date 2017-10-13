<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Amics;

/**
 * AmicsSearch represents the model behind the search form about `app\models\Amics`.
 */
class AmicsSearch extends Amics
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'telefon', 'telefon_mobil'], 'integer'],
            [['cognoms', 'nom', 'adresa', 'cp', 'poblacio', 'comarca', 'mail', 'nif', 'data_naix', 'data_proc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Amics::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'numero' => $this->numero,
            'telefon' => $this->telefon,
            'telefon_mobil' => $this->telefon_mobil,
            'data_naix' => $this->data_naix,
            'data_proc' => $this->data_proc,
        ]);

        $query->andFilterWhere(['like', 'cognoms', $this->cognoms])
            ->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'adresa', $this->adresa])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'poblacio', $this->poblacio])
            ->andFilterWhere(['like', 'comarca', $this->comarca])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'nif', $this->nif]);

        return $dataProvider;
    }
}
