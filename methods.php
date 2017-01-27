
<LinearLayout xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:tools="http://schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:gravity="center_horizontal"
    android:orientation="vertical"
    android:paddingBottom="@dimen/activity_vertical_margin"
    android:paddingLeft="@dimen/activity_horizontal_margin"
    android:paddingRight="@dimen/activity_horizontal_margin"
    android:paddingTop="@dimen/activity_vertical_margin"
    tools:context=".RestaurantRegisterActivity">

    <ScrollView
        android:id="@+id/registration"
        android:layout_width="match_parent"
        android:layout_height="match_parent">

        <LinearLayout
            android:id="@+id/register"
            android:layout_width="match_parent"
            android:layout_height="wrap_content"
            android:orientation="vertical">

            <android.support.design.widget.TextInputLayout
                android:layout_width="match_parent"
                android:layout_height="wrap_content">

                <EditText
                    android:id="@+id/title"
                    android:layout_width="match_parent"
                    android:layout_height="wrap_content"
                    android:hint="Title"
                    android:inputType="text"
                    android:maxLines="1" />

            </android.support.design.widget.TextInputLayout>

            <RadioGroup
                android:id="@+id/radiogroup"
                android:layout_width="fill_parent"
                android:layout_height="wrap_content"
                android:orientation="horizontal">
                <RadioButton android:id="@+id/pub"
                    android:layout_width="wrap_content"
                    android:layout_height="wrap_content"
                    android:text="Pub"/>
                <RadioButton android:id="@+id/bar"
                    android:layout_width="wrap_content"
                    android:layout_height="wrap_content"
                    android:text="Bar"/>
                <RadioButton android:id="@+id/restaurant"
                    android:layout_width="wrap_content"
                    android:layout_height="wrap_content"
                    android:text="Restaurant"/>
            </RadioGroup>

            <android.support.design.widget.TextInputLayout
                android:layout_width="match_parent"
                android:layout_height="wrap_content">

                <EditText
                    android:id="@+id/description"
                    android:layout_width="match_parent"
                    android:layout_height="wrap_content"
                    android:hint="Description"
                    android:inputType="text"
                    android:maxLines="1" />

            </android.support.design.widget.TextInputLayout>

            <android.support.design.widget.TextInputLayout
                android:layout_width="match_parent"
                android:layout_height="wrap_content">

                <EditText
                    android:id="@+id/address"
                    android:layout_width="match_parent"
                    android:layout_height="wrap_content"
                    android:hint="address"
                    android:inputType="text"
                    android:maxLines="1" />

            </android.support.design.widget.TextInputLayout>


            <Button
                android:id="@+id/register"
                style="?android:textAppearanceSmall"
                android:layout_width="match_parent"
                android:layout_height="wrap_content"
                android:layout_marginTop="16dp"
                android:text="Register"
                android:textStyle="bold" />

        </LinearLayout>
    </ScrollView>
</LinearLayout>

