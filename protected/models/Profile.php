<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property integer $phone
 * @property string $address
 * @property string $employee_code
 * @property string $secret_key
 * @property string $position
 * @property integer $date_of_birth
 * @property integer $updated_at
 * @property integer $created_at
 */
class Profile extends CActiveRecord 
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Profile the static model class
     */
    public static function model($className = __CLASS__) 
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() 
    {
        return 'profile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() 
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, employee_code', 'required'),
            array('phone, date_of_birth, updated_at, created_at', 'numerical', 'integerOnly' => true),
            array('email, position', 'length', 'max' => 45),
            array('name, secret_key', 'length', 'max' => 255),
            array('employee_code', 'length', 'max' => 20),
            array('address', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, email, name, phone, address, employee_code, secret_key, position, date_of_birth, updated_at, created_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() 
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() 
    {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'employee_code' => 'Employee Code',
            'secret_key' => 'Secret Key',
            'position' => 'Position',
            'date_of_birth' => 'Date Of Birth',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() 
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('phone', $this->phone);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('employee_code', $this->employee_code, true);
        $criteria->compare('secret_key', $this->secret_key, true);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('date_of_birth', $this->date_of_birth);
        $criteria->compare('updated_at', $this->updated_at);
        $criteria->compare('created_at', $this->created_at);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}