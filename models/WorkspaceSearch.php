<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workspace;

/**
 * WorkspaceSearch represents the model behind the search form about `app\models\Workspace`.
 */
class WorkspaceSearch extends Workspace
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WorkspaceID', 'AreaID', 'Capacity', 'IsActive'], 'integer'],
            [['Name', 'AdditionalInfo'], 'safe'],
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
        $query = Workspace::find()->where(['IsActive' => 1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'WorkspaceID' => $this->WorkspaceID,
            'AreaID' => $this->AreaID,
            'Capacity' => $this->Capacity,
            'IsActive' => $this->IsActive,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'AdditionalInfo', $this->AdditionalInfo]);

        return $dataProvider;
    }
}
