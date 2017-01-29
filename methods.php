

<LinearLayout
            android:layout_width="wrap_content"
            android:layout_height="wrap_content"
            android:paddingLeft="16sp"
            android:orientation="vertical">
            <TextView
                android:layout_width="wrap_content"
                android:layout_height="wrap_content"
                android:id="@+id/title"
                android:textStyle="bold"/>
            <TextView
                android:layout_width="wrap_content"
                android:layout_height="wrap_content"
                android:id="@+id/type"/>
    
            <TextView
                android:layout_width="wrap_content"
                android:layout_height="wrap_content"
                android:id="@+id/address"
                android:textColor="#000"/>

            <TextView
                android:layout_width="wrap_content"
                android:layout_height="wrap_content"
                android:id="@+id/description"/>
    
            <RatingBar
                android:layout_width="wrap_content"
                android:layout_height="wrap_content"
                android:id="@+id/ratingBar"
                style="?android:attr/ratingBarStyleSmall"
                android:numStars="5"
                android:stepSize="0.1"
                android:isIndicator="true"/>
        </LinearLayout>
