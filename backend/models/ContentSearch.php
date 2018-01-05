<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ContentBlocks;

/**
 * ContentSearch represents the model behind the search form about `backend\models\ContentBlocks`.
 */
class ContentSearch extends ContentBlocks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show_title', 'status'], 'integer'],
            [['title', 'position', 'text'], 'safe'],
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
        $query = ContentBlocks::find();

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
            'id' => $this->id,
            'show_title' => $this->show_title,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
